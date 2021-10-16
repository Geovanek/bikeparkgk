<?php

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

Route::view('/', 'index')->name('home');

Auth::routes();

Route::view('/profile/{id}', 'profile')->middleware('auth')->name('profile');
Route::group(['prefix' => 'locallegend'], function(){
    Route::view('/ranking', 'ranking')->name('ranking');
});
Route::view('/admin/dashboard', 'admin.dashboard')->middleware(['auth','admin'])->name('admin.dashboard');
