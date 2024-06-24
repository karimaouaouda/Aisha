<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('categories', function(){
    $available_categories = Config::get('doctor.specialities_options');

    return response()->json([
        'categories' => array_keys($available_categories)
    ]);
});
