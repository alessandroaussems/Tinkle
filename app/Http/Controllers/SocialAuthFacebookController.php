<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\Http\Requests;
use App\SocialAccountService;

class SocialAuthFacebookController extends Controller
{
    public function  redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function callback(SocialAccountService $service)
    {
        $user = $service->createOrGetUser(Socialite::driver('facebook')->user());

        auth()->login($user);

        return redirect("/");
    }
}
