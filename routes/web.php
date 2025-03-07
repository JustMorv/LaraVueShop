<?php

use App\Http\Controllers\AuthControler;
use App\Http\Controllers\HomeControler;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

Route::get('/',HomeControler::class)->name('home');


Route::controller(AuthControler::class)->group(function () {
    Route::get('/login','index')->name('login');
    Route::post('/login','signIn')->name('signIn');


    Route::get('/sign-up','signUp')->name('signUp');
    Route::post('/sign-up','store')->name('store');

    Route::delete('/logout','logout')->name('logout');


    Route::get('/forgot-password','forgot')
        ->middleware('guest')->name('password.request');
    Route::post('/forgot-password','forgotPassword')
        ->middleware('guest')->name('password.email');


    Route::get('/reset-password/{token}', 'reset')
        ->middleware('guest')->name('password.reset');


    Route::post('/reset-password', 'resetPassword')
        ->middleware('guest')->name('password.update');



    Route::get('/auth/socialite/github', 'github')->name('socialite.github');

    Route::get('/auth/socialite/github/callback', 'githubCallback')->name('socialite.github.callback');


});



