<?php

namespace App\Http\Middleware;

use App\Models\Poll;
use Closure;

use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;


class RecordPollView
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $uniqueIdentifier = $request->route('unique_identifier');

        $poll = Poll::where('unique_identifier', $uniqueIdentifier)->first();

        if (!$poll) {
            // Poll not found, handle it as needed (e.g., redirect or return an error response)
            return redirect()->route('create-poll')->with('error', 'Poll not found');
        }

        $ip = $request->ip();

        $cacheKey = "poll_view_{$poll->id}_{$ip}";

        if (!Cache::has($cacheKey)) {
            $poll->increment('views');
            Cache::put($cacheKey, true, now()->addHours(24)); // Adjust the duration as needed
        }

        return $next($request);
    }
}
