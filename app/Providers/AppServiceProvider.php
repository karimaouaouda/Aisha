<?php

namespace App\Providers;

use App\Http\Controllers\ChatController;
use App\Services\Ai\TextEmotionService;
use App\Services\Ai\VoiceEmotionService;
//use BezhanSalleh\FilamentLanguageSwitch\LanguageSwitch;
use App\Services\Logger;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->when([
            ChatController::class
        ])->needs(
            StatefulGuard::class
        )->give(function(){
            return Auth::guard('patient');
        });

        $this->app->when(ChatController::class)
                        ->needs(VoiceEmotionService::class)
                        ->give(function(){
                            return new VoiceEmotionService();
                        });

        $this->app->when(ChatController::class)
            ->needs(TextEmotionService::class)
            ->give(function(){
                return new TextEmotionService();
            });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        URL::forceScheme('https');

        Livewire::setScriptRoute(function ($handle) {
            return Route::get(Config::get('livewire.script_route', 'aisha/public/livewire/livewire.js'), $handle)
                        ->middleware('web');
        });

        Livewire::setUpdateRoute(function($handle){
            return Route::post(Config::get('livewire.update_route', 'aisha/public/livewire/update'), $handle)
                        ->middleware('web');
        });

        $this->app->singleton(Logger::class, function(Application $app){
            return new Logger('logs');
        });
    }
}
