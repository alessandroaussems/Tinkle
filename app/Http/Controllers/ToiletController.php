<?php

namespace App\Http\Controllers;
use App\Toilet;
use App\Vote;
use App\User;
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
        for($i=0;$i<count($toilets);$i++)
        {
            $goodvotes=0;
            $badvotes=0;
            $votes=Vote::all()->where("toiletid",$toilets[$i]->id);
            echo $votes;
            for($j=0;$j<count($votes);$j++)
            {
                if($votes[$j]->sort==0)
                {
                    $goodvotes++;
                }
                else
                {
                    $badvotes++;
                }
            }
            $toilets[$i]->{"goodvotes"}=$goodvotes;
            $toilets[$i]->{"badvotes"}=$badvotes;

        }

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
            'image'      => 'required|image',
            'percentagehome' => 'required'

        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('toilets/create')
                ->withErrors($validator)
                ->withInput();
        }
        if (intval(Input::get('percentagehome')) < 0 || intval(Input::get('percentagehome'))> 100)
        {
            return Redirect::to('toilets/create')
                ->withErrors("Percentage must be between 0 and 100")
                ->withInput();
        }
        else {
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
                if(Input::get("disabledcancome") == true)
                {
                    $disabledcancome=1;
                }
                else
                {
                    $disabledcancome=0;
                }
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
                $toilet->disabledcancome = $disabledcancome;
                $toilet->percentagehome  = Input::get('percentagehome');

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
            'image'      => 'required|image',
            'percentagehome' => 'required'

        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('toilets/'.$id."/edit")
                ->withErrors($validator)
                ->withInput();
        }
        if (intval(Input::get('percentagehome')) < 0 || intval(Input::get('percentagehome'))> 100)
        {
            return Redirect::to('toilets/create')
                ->withErrors("Percentage must be between 0 and 100")
                ->withInput();
        }
        else {
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
                if(Input::get("disabledcancome") == true)
                {
                    $disabledcancome=1;
                }
                else
                {
                    $disabledcancome=0;
                }
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
                $toilet->disabledcancome = $disabledcancome;
                $toilet->percentagehome  = Input::get('percentagehome');


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
        if($toilet === NULL)
        {
            abort(404);
        }
        else
        {
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

    }
    public  function votesubmit()
    {
        $rules = array(
            'vote'      => 'required',

        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails())
        {
            return Redirect::to('toilet/vote/'.$id)
                ->withErrors($validator)
                ->withInput();
        } else {
            $sort=Input::get("vote");
            if ($sort == "Good")
            {
                $sortofvote = 1;
            }
            else
            {
                $sortofvote = 0;
            }
            $vote = new Vote();
            $vote->userid = Auth::user()->id;
            $vote->toiletid = Input::get("invisibleid");
            $vote->sort = $sortofvote;
            $vote->comment=Input::get("comment");

            $vote->save();

            return view("votesubmit");
        }

    }
    public function show($id)
    {
        $goodvotes=[];
        $badvotes=[];
        $comments=[];
        $toilet = Toilet::find($id);
        $user = User::find($toilet->userid);
        $votes = Vote::all()->where("toiletid",$id);
        for ($i=0;$i<count($votes);$i++)
        {
            if($votes[$i]->sort==0)
            {
                array_push($badvotes,$votes[$i] );
            }
            else
            {
                array_push($goodvotes,$votes[$i] );
            }
            if($votes[$i]->comment!=NULL)
            {
                $idofvoter=$votes[$i]->userid;
                $user = User::find($idofvoter);
                $user_name=$user->name;
                $thecomment=[];
                array_push($thecomment,$user_name);
                array_push($thecomment,$votes[$i]->comment);
                array_push($comments,$thecomment);
            }
        }
        $number_goodvotes=count($goodvotes);
        $number_badvotes=count($badvotes);
        return view("toiletdetail")
            ->with('toilet', $toilet)
            ->with('badvotes', $number_badvotes)
            ->with('goodvotes', $number_goodvotes)
            ->with('comments', $comments)
            ->with('user',$user->name);

    }
}
