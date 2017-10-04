<?php

namespace App\Http\Controllers;

use Request;
use PulkitJalan\GeoIP\GeoIP;

class FindToiletController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    function index()
    {
        $geoip= new GeoIP();
        $geoip->setIp('127.0.0.1');

        $lat =  $geoip->getLongitude();
        $lon = $geoip->getLatitude();
        $city = $geoip->getCity();
        echo $city;
        echo $lat;
        echo $lon;
        return view("findtoilet");
    }
}
