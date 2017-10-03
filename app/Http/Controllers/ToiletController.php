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
            // store
            $toilet = new Toilet();
            $toilet->title           = Input::get('title');
            $toilet->adress          = Input::get('adress');
            $toilet->city            = Input::get('city');
            $toilet->description     = Input::get('description');
            $toilet->picture         = Input::get('image');
            $toilet->userid          = Auth::user()->id;

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

        // redirect
        Session::flash('message', 'Successfully deleted toilet');
        return Redirect::to('toilets');
    }
}
