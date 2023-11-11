<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingsController extends Controller
{
    //
    public function show()
    {
        
        $settings = DB::table('settings')->where('id', 1)->first();
        return view('admin.setting', ['settings' => $settings]);
    }

    public function update(Request $request)
    {
        $data = $request->only([
            'header',
            'footer',
            'CreatePageAds1', 'CreatePageAds2', 'CreatePageAds3',
            'HomePageAds1', 'HomePageAds2', 'HomePageAds3',
            'SharePageAds1', 'SharePageAds2', 'SharePageAds3',
            'ShowPageAds1', 'ShowPageAds2', 'ShowPageAds3',
            'showVotePageAds1', 'showVotePageAds2', 'showVotePageAds3',
          
        ]);
    
        DB::table('settings')->where('id', 1)->update($data);
    
        return redirect()->route('settings.show')->with('success', 'Settings updated successfully.');

    }
    
}
