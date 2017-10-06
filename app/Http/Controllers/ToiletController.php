<?php

namespace App\Http\Controllers;
use App\Toilet;
use App\Vote;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


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
    public function store(Request $request)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'title'      => 'required',
            'adress'     => 'required' ,
            'city'       => 'required',
            'description'=> 'required',
            'image'      => 'required|image'

        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('toilets/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            $image = $request->file('image');
            $photoName = Input::get('title').'.'.$image->getClientOriginalExtension();
            $image->move(public_path('img/toiletuploads'), $photoName);

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
            }if(isset($latitude) && isset($longitude))
            {
                // store
                $toilet = new Toilet();
                $toilet->title           = Input::get('title');
                $toilet->adress          = Input::get('adress');
                $toilet->city            = Input::get('city');
                $toilet->description     = Input::get('description');
                $toilet->picture         = $photoName;
                $toilet->userid          = Auth::user()->id;
                $toilet->lat             = $latitude;
                $toilet->long            = $longitude;

                $toilet->save();

                // redirect
                Session::flash('message', 'Successfully added!');
                return Redirect::to('/toilets');
            }
            else
            {
                return Redirect::to('toilets/create')
                    ->withErrors("This adress could not be resolved! Our apologies!")
                    ->withInput();
            }


        }
    }
    public function edit($id)
    {
        $toilet = Toilet::find($id);
        return view("edittoilet")->with('toilet', $toilet);
    }
    public function update($id,Request $request)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'title'      => 'required',
            'adress'     => 'required' ,
            'city'       => 'required',
            'description'=> 'required',
            'image'      => 'required|image'

        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('toilets/'.$id."/edit")
                ->withErrors($validator)
                ->withInput();
        } else {
            $image = $request->file('image');
            $photoName = Input::get('title').'.'.$image->getClientOriginalExtension();
            $image->move(public_path('img/toiletuploads'), $photoName);

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
            if(isset($latitude) && isset($longitude)) {
                // store
                $toilet = Toilet::find($id);
                $toilet->title = Input::get('title');
                $toilet->adress = Input::get('adress');
                $toilet->city = Input::get('city');
                $toilet->description = Input::get('description');
                $toilet->picture         = $photoName;
                $toilet->lat             = $latitude;
                $toilet->long            = $longitude;
                $toilet->picture = $photoName;


                $toilet->save();
            }
            else
            {
                return Redirect::to('toilets/'.$id."/edit")
                    ->withErrors("This adress could not be resolved! Our apologies!")
                    ->withInput();
            }

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
    public function vote($id)
    {

        $toilet = Toilet::find($id);
        $vote   = Vote::all()->where("userid",Auth::user()->id);
        if($vote->isEmpty())
        {
            $alreadyvoted=false;
            return view("votetoilet")->with("toilet",$toilet)->with("alreadyvoted",$alreadyvoted);
        }
        else
        {
            $alreadyvoted=true;
            $error="You already voted for this toilet!";
            return view("votetoilet")->with("error",$error)->with("alreadyvoted",$alreadyvoted);
        }

    }
    public  function votesubmit()
    {
        $sort=Input::get('action');
        if($sort=="Up")
        {
            $sortofvote=true;
        }
        else
        {
            $sortofvote=false;
        }
        $vote = new Vote();
        $vote->userid            = Auth::user()->id;
        $vote->toiletid          = Input::get("invisibleid");
        $vote->sort              = $sortofvote;

        $vote->save();
        echo "Thanks for your vote!";

    }
    public function show($id)
    {
        $toilet = Toilet::find($id);
        return view("toiletdetail")->with('toilet', $toilet);
    }
}
