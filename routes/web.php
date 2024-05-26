<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\MLConntroller;
use App\Http\Middleware\AuthSetter;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([AuthSetter::class])->group(function () {
    Route::middleware([
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified',
    ])->group(function () {
        Route::get('/dashboard', function () {
            $user = auth()->user();

            $redirectTo = \App\Enums\AuthRoles::PATIENT;

            if( $user->role == \App\Enums\AuthRoles::PATIENT->value ){
                $redirectTo = "/workspace";
            }
            if( $user->role == \App\Enums\AuthRoles::DOCTOR->value ){
                $redirectTo = "/doctor/workspace";
            }
            return redirect($redirectTo);
        })->name('dashboard');
    });

    Route::get('/test', function () {
        $process = Artisan::call('analyzer:run', [
            '--audio' => base_path('\storage\app\public\audio\661fe8c165407.wav')
        ]);

        $output = Artisan::output();

        return $output;
    });

    Route::get('/test-chat', function () {
        return view('test');
    });

    Route::get('/test-chain', [MainController::class, "chain"]);

    Route::post('/upload-audio', [MainController::class, 'upload']);

    Route::middleware(['auth'])
        ->group(function () {

            Route::controller(MainController::class)
                ->group(function () {


                    Route::get('/chat', 'create');

                    Route::post('message/send', 'send');
                });
        });


    Route::get("/profile", function(){
        return view('auth.custom.profile');
    });
});


Route::get('/settings', function(){
    return view("amir.settings");
});


Route::get('/test-ml', [MLConntroller::class, "index"]);
