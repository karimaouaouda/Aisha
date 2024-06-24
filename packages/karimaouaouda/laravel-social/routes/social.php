<?php

use Illuminate\Support\Facades\Route;
use Karimaouaouda\LaravelSocial\Http\Controllers\MainController;

Route::controller(MainController::class)
    ->group(function(){

        Route::get('/posts', 'index');

    });