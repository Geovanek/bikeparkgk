<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PushController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\StravaSocialite;
use Illuminate\Support\Facades\Route;


/** Strava Socialite Routes */
Route::get('/redirect', [StravaSocialite::class, 'redirect'])->name('strava.redirect');
Route::get('/callback', [StravaSocialite::class, 'login'])->name('strava.login');

/** Push Subscription Routes */
    //make a push notification.
Route::get('/push',[PushController::class,'push'])->name('push');
    //store a push subscriber.
Route::post('/push',[PushController::class,'store'])->name('push.subscription');

/** Sitemap Routes */
//Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap.index');

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/profile/{id}', [ProfileController::class, 'index'])->middleware('auth')->name('profile');
