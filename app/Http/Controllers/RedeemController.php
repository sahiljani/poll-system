<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RedeemController extends Controller
{
    //
    public function show($id)
    {
        // Retrieve the redeem record with the given ID from local storage (e.g., session)
        $redeem = session()->get("redeems.$id");

        // Return the view to display the redeem details
        return view('redeem.show', compact('redeem'));
    }

    public function edit()
    {
       

    
        return response()->json(['redeem' => "redeem"]);
    }

}
