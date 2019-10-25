<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/login', 'Api\Auth\LoginController@login');


Route::post('/logout', 'Api\Auth\LoginController@logout');

Route::post('evento', 'EventoController@evento' );