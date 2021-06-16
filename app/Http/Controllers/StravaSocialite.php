<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Socialite;
use Auth;
use Carbon\Carbon;
use Exception;
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

        try {
            $providerUser = Socialite::driver('strava')->user();
        } catch (Exception $ex) {
            $code = $ex->getCode();
            switch ($code) {
                case '429':
                    $error = 'strava-rate-limit'; 
                    $msg = 'A taxa limite de comunicação com o STRAVA foi alcançada para o dia de hoje. Por favor, tente novamente, mas provavelmente, só amanhã.';
                    break;
                default :
                    $error = 'error-strava';
                    $msg = 'Estamos passando por alguma instabilidade. Por favor, tenta novamente ou contato o responsável.';
                    break;
                }
            return redirect('/')->with($error, $msg);
        }


        if ($providerUser->user['sex'] == null) {
            return redirect('/')->with('strava-sex', 'O campo sexo em seu STRAVA não está preenchido, esse campo é obritório para o cadastro no site.');
        }

        $user = User::firstOrCreate(['strava_id' => $providerUser->getId()],[
            'name' => $providerUser->getName() ?? $providerUser->getNickname(),
            'strava_id' => $providerUser->getid(),
            'avatar' => $providerUser->getAvatar(),
            'profile_link' => 'https://www.strava.com/athletes/'. $providerUser->getid(),
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
