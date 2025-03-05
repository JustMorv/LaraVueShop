<?php

use App\Http\Controllers\AuthControler;
use App\Http\Controllers\HomeControler;
use Illuminate\Support\Facades\Route;

Route::get('/',HomeControler::class)->name('home');


Route::controller(AuthControler::class)->group(function () {
    Route::get('/login','index')->name('login');
    Route::post('/login','signIn')->name('signIn');
    Route::get('/sign-up','signUp')->name('signUp');

});
