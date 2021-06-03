<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Socialite;
use Auth;
use Carbon\Carbon;
use Redirect;

class StravaSocialite extends Controller
{
    public function Redirect()
    {
        return Socialite::driver('strava')
                            ->setScopes(['profile:read_all', 'activity:read_all'])
                            ->redirect();
    }

    public function Login()
    {
        $providerUser = Socialite::driver('strava')->user();

        if ($providerUser->user['sex'] == null) {
            return redirect('/')->with('strava-sex', 'O campo sexo em seu STRAVA não está preenchido, esse campo é obritório para o cadastro no site.');
        }

        $user = User::firstOrCreate(['strava_id' => $providerUser->getId()],[
            'name' => $providerUser->getName() ?? $providerUser->getNickname(),
            'strava_id' => $providerUser->getid(),
            'avatar' => $providerUser->getAvatar(),
            'access_token' => $providerUser->accessTokenResponseBody['access_token'],
            'refresh_token' => $providerUser->accessTokenResponseBody['refresh_token'],
            'expires_at' => Carbon::createFromTimestamp($providerUser->accessTokenResponseBody['expires_at']),
            'sex' => $providerUser->user['sex'],
            'city' => $providerUser->user['city'],
            'state' => $providerUser->user['state'],
        ]);

        Auth::login($user, true);

        return redirect('/');
    }
}
