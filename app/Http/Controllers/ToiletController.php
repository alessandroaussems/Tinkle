<?php

namespace App\Http\Controllers;
use App\Toilet;
use Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Request;
use Input;


class ToiletController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $toilets = Toilet::all()->where("userid",Auth::user()->id);

        return view("usertoilets")->with('toilets',$toilets);

    }
    public function create()
    {
        return view("addtoilet");
    }
    public function store()
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'title'      => 'required',
            'adress'     => 'required' ,
            'city'       => 'required',
            'description'=> 'required',
            'image'      => ''

        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('toilets/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            $address = Input::get("adress").Input::get("city");
            $url = "http://maps.google.com/maps/api/geocode/json?address=".urlencode($address);


            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $responseJson = curl_exec($ch);
            curl_close($ch);

            $response = json_decode($responseJson);

            if ($response->status == 'OK') {
                $latitude = $response->results[0]->geometry->location->lat;
                $longitude = $response->results[0]->geometry->location->lng;
            }
            // store
            $toilet = new Toilet();
            $toilet->title           = Input::get('title');
            $toilet->adress          = Input::get('adress');
            $toilet->city            = Input::get('city');
            $toilet->description     = Input::get('description');
            $toilet->picture         = Input::get('image');
            $toilet->userid          = Auth::user()->id;
            $toilet->lat             = $latitude;
            $toilet->long            = $longitude;

            $toilet->save();

            // redirect
            Session::flash('message', 'Successfully added!');
            return Redirect::to('/toilets');
        }
    }
    public function edit($id)
    {
        $toilet = Toilet::find($id);
        return view("edittoilet")->with('toilet', $toilet);
    }
    public function update($id)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'title'      => 'required',
            'adress'     => 'required' ,
            'city'       => 'required',
            'description'=> 'required',
            'image'      => ''

        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('toilets/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            // store
            $toilet                 = Toilet::find($id);
            $toilet->title          = Input::get('title');
            $toilet->adress         = Input::get('adress');
            $toilet->city           = Input::get('city');
            $toilet->description    = Input::get('description');
            $toilet->picture        = Input::get('image');
            $toilet->userid          = Auth::user()->id;


            $toilet->save();

            // redirect
            Session::flash('message', 'Successfully added!');
            return Redirect::to('/toilets');
        }
    }

    public function destroy($id)
    {
        // delete
        $toilet = Toilet::find($id);
        $toilet->delete();
        return Redirect::to('toilets');
    }
}
