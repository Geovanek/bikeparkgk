<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Guest;
use App\Notifications\LegendNotification;
use Auth;
use Illuminate\Support\Str;
use Notification;

class PushController extends Controller
{
    /**
     * Store the PushSubscription.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'endpoint'    => 'required',
            'keys.auth'   => 'required',
            'keys.p256dh' => 'required'
        ]);
        $endpoint = $request->endpoint;
        $token = $request->keys['auth'];
        $key = $request->keys['p256dh'];
        /* $user = Guest::firstOrCreate([
            'endpoint' => $endpoint
        ]); */
        $user = Auth::user();
        //$user->uuid = Str::uuid();
        //$user->save();
        $user->updatePushSubscription($endpoint, $key, $token);
        
        return response()->json(['success' => true],200);
    }

    /**
     * Send Push Notifications to all users.
     * 
     * @return \Illuminate\Http\Response
     */
    public function push()
    {
        Notification::send(User::all(),new LegendNotification);

        return redirect()->back();
    }
}
