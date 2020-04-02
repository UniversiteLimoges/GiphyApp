<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function getUserLocation(Request $request)
    {
    	// return response()->json($location);
    	return $request->user()->location;
    }
}
