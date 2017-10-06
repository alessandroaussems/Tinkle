<?php


namespace App\Http\Controllers;
use App\Toilet;

use Request;

class FindToiletController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    function index()
    {
        $toilets = Toilet::all('title','id','lat','long');
        return view("findtoilet")->with('toilets',$toilets);
    }
}
