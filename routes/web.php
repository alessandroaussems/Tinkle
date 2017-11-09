<?php
use Jenssegers\Agent\Agent;

$agent = new Agent();
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
if($agent->isMobile())
{
    Route::get('/', function () {
        return view('welcome');
    });

    Auth::routes();

    Route::get('/redirect', 'SocialAuthFacebookController@redirect');
    Route::get('/callback', 'SocialAuthFacebookController@callback');

//Route::get('/', 'HomeController@index')->name('home'); //defines pages to which user is redirected on login

    Route::get("/findatoilet","FindToiletController@index");

    Route::resource('toilets', 'ToiletController');

    Route::get("/toilet/vote/{id}","ToiletController@vote");
    Route::post('votesubmit', ['uses' => 'ToiletController@votesubmit']);

    Route::get('/dashboard', function () {
        // Only authenticated users may enter...
        return view('welcome');
    })->middleware('auth');
}
if($agent->isDesktop())
{
    Route::get('/', function () {
        return view('tinkle');
    });
    Route::any( '{catchall}', function ( $page ) { //catchallpages
        return view('tinkle'); //redirect
    } )->where('catchall', '(.*)');
}

