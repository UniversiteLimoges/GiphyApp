<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    public function geoip()
    {
    	$actual_location = geoip()->getLocation($_SERVER['REMOTE_ADDR']);

    	$current_user = Auth::user();

    	if($current_user->has('location')) {
    		$location = 'yes';
    		$location = $current_user->location;
    	}else{
    		$location = 'no';
    	}

    	return view('test', compact(['actual_location', 'location', 'current_user']));
    }
}
