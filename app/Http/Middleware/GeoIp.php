<?php

namespace App\Http\Middleware;

use Closure;
use App\Location;
use App\User;
use Illuminate\Support\Facades\Auth;

class GeoIp
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Get current User
        $current_user = Auth::user();

        // Get instance of \Torann\GeoIP\Facades\GeoIP
        $actual_location = geoip()->getLocation($_SERVER['REMOTE_ADDR']);

        if( 
            $current_user->location
            //!empty($current_user->location_ip)
            //$current_user->has('location')
            ) {

            $location = $current_user->location;

            $location->user_id = $current_user->id;
            $location->ip = $_SERVER['REMOTE_ADDR'];
            $location->country = $actual_location->country;
            $location->city = $actual_location->city;
            $location->lat = $actual_location->lat;
            $location->lon = $actual_location->lon;

            $location->save();

        }else{

            $location = New Location();

            $location->user_id = $current_user->id;
            $location->ip = $_SERVER['REMOTE_ADDR'];
            $location->country = $actual_location->country;
            $location->city = $actual_location->city;
            $location->lat = $actual_location->lat;
            $location->lon = $actual_location->lon;

            $location->save();  
        }

        return $next($request);
    }
}
