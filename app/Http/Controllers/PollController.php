<?php

namespace App\Http\Controllers;

use App\Models\IpRecord;
use App\Models\Poll;
use App\Models\PollOption;
use GuzzleHttp\Handler\StreamHandler;
use Illuminate\Http\Request;
use Illuminate\Log\Logger;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;

class PollController extends Controller {
    //
    public function create() {
        return view('front.create');
    }

    public function store(Request $request) {
        $rules = [
            'title' => 'required|string',
            'head_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'options.*' => 'required|string',
            'customShareField' => 'nullable|string',
        ];
    
        $request->validate($rules);
    
        // Handle image upload
        if ($request->hasFile('head_img')) {
            $imagePath = $request->file('head_img')->store('poll_images', 'public');
        } else {
            $imagePath = null;
        }
    
        // Determine checkbox values
        $oneVotePerIp = $request->has('oneVotePerIp') ? 1 : 0;
        $votePerBrowser = $request->has('votePerBrowser') ? 1 : 0;
        $customShare = $request->has('customShare') ? 1 : 0;
        // $customShareField = $customShare ? $request->input('customShareField') : null;
        $customShareField = $customShare ? nl2br($request->input('customShareField')) : null;

    
        // Create a new poll
        $poll = new Poll([
            'question' => $request->input('title'),
            'image_url' => $imagePath,
            'unique_identifier' => uniqid(),
            'Is_IP_validate' => $oneVotePerIp,
            'Is_browser_validate' => $votePerBrowser,
            'share_message' => $customShareField,
        ]);
    
        $poll->save();
    
        // Attach options to the poll
        $options = $request->input('options');
        foreach ($options as $optionText) {
            $option = new PollOption([
                'poll_id' => $poll->id, // Assign the poll_id here
                'option_text' => $optionText,
            ]);
    
            $option->save();
        }
    
        // Create an IP record
        $ipAddress = $request->ip();
        if ($oneVotePerIp) {
            $existingVote = IpRecord::where('poll_id', $poll->id)
                ->where('ip_address', $ipAddress)
                ->first();
    
            if ($existingVote) {
                return redirect()->back()->with('error', 'You have already voted in this poll.');
            }
        }
    
        // Handle custom share message logic if needed
    
        return redirect()
            ->route('share-poll', ['unique_identifier' => $poll->unique_identifier])
            ->cookie('unique_identifier', $poll->unique_identifier);
    }
    
    public function share($unique_identifier) {
        $poll = Poll::where('unique_identifier', $unique_identifier)->first();

        if (!$poll) {
            // Handle the case where the poll with the given identifier is not found
            return redirect()
                ->route('create-poll')
                ->with('error', 'Poll not found');
        }

        $pollOptions = PollOption::where('poll_id', $poll->id)->get();

        // Check if the 'unique_identifier' cookie exists
        if (Cookie::has('unique_identifier') && Cookie::get('unique_identifier') === $unique_identifier) {
            return view('front.share', compact('poll', 'pollOptions'));
        } else {
            return redirect()->route('show-poll', ['unique_identifier' => $unique_identifier]);
        }
    }

    public function delete($unique_identifier) {
        $poll = Poll::where('unique_identifier', $unique_identifier)->first();

        if (!$poll) {
            return redirect()
                ->route('share-poll', $unique_identifier)
                ->with('error', 'Poll not found');
        }

        // Delete related poll options
        PollOption::where('poll_id', $poll->id)->delete();

        // Delete the poll
        $poll->delete();

        return redirect()
            ->route('create-poll')
            ->with('success', 'Poll deleted successfully.');
    }

    public function show($unique_identifier) {
        // Check if the user has already seen this poll
        if (Cookie::has('unique_identifier') && Cookie::get('unique_identifier') === $unique_identifier) {
            return redirect()->route('share-poll', ['unique_identifier' => $unique_identifier]);
        }

        // Retrieve the poll based on the unique identifier
        $poll = Poll::where('unique_identifier', $unique_identifier)->first();

        // If the poll does not exist, redirect to create-poll route with an error message
        if (!$poll) {
            return redirect()
                ->route('create-poll')
                ->with('error', 'Poll not found');
        }

        // Get the poll options associated with the poll
        $pollOptions = PollOption::where('poll_id', $poll->id)->get();

        // Increment the views count for this poll
        $poll->increment('views');

        // Get the top polls based on views
        $topPolls = Poll::orderBy('views', 'desc')
            ->take(5)
            ->get();

        // Get the recent polls based on updated date
        $recentPolls = Poll::orderBy('updated_at', 'desc')
            ->take(5)
            ->get();

        return view('front.show', compact('poll', 'pollOptions', 'topPolls', 'recentPolls'));
    }

    public function vote(Request $request, $unique_identifier) {
        $ipAddress = $request->getClientIp();
    

        if ($request->cookie('vote') === $unique_identifier) {
            return redirect()
                ->back()
                ->with('error', 'You have already voted in this poll.');
        }

        $poll = Poll::where('unique_identifier', $unique_identifier)->first();

        $ipAddress = $request->ip();
        $existingVote = IpRecord::where('poll_id', $poll->id)
            ->where('ip_address', $ipAddress)
            ->first();

        if ($existingVote) {
            return redirect()
                ->back()
                ->with('error', 'You have already voted in this poll.' );
        }

        if (!$poll) {
            return redirect()
                ->route('share-poll', $unique_identifier)
                ->with('error', 'Poll not found');
        }

        $selectedOptionId = $request->input('option');
      
        $option = PollOption::find($selectedOptionId);
        
   

        // Increment the vote count for the selected option
        $option->increment('votes');

        // Create a new IP record
        IpRecord::create([
            'poll_id' => $poll->id,
            'ip_address' => $ipAddress,
        ]);

        // Set the 'vote' cookie with the value of $unique_identifier and no expiration
        $response = redirect()
            ->route('show-vote', $unique_identifier)
            ->with('success', 'Vote counted successfully');
        return $response->withCookie(cookie()->forever('vote', $unique_identifier));
    }

    public function showVote($unique_identifier) {
        $poll = Poll::where('unique_identifier', $unique_identifier)->first();

        if (!$poll) {
            // Handle the case where the poll with the given identifier is not found
            return redirect()
                ->route('create-poll')
                ->with('error', 'Poll not found');
        }

        $pollOptions = PollOption::where('poll_id', $poll->id)->get();

        return view('front.showVote', compact('poll', 'pollOptions'));
    }

    public function listPollsWithOptions() {
        // Get all polls with their associated options
        $polls = Poll::with('options')->get();

        return response()->json($polls);
    }

    public function listPolls() {
        return view('admin.list');
    }

    public function logvote(Request $request, $uniqueIdentifier){
       
        $reportInput = $request->input('report');
        Log::channel('report')->info("Report input: $reportInput");
        $pollUrl = route('show-poll', ['unique_identifier' => $uniqueIdentifier]);

        // Log the unique identifier
        Log::channel('report')->info("poll Url: $pollUrl ");


    Log::channel('report')->info("-------------------------");

        // Your existing code or logic here...
    
        // For example, if you want to return a response
        return response()->json(['message' => 'Vote logged successfully']);
    
}
}
