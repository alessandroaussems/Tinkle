<?php

namespace App\Http\Controllers;

use Request;

class FindToiletController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    function index()
    {

    }
}
