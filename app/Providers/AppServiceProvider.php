<?php

namespace App\Providers;

use App\Http\Controllers\ChatController;
use App\Services\Ai\GeminiService;
use App\Services\Ai\TextEmotionService;
use App\Services\Ai\VoiceEmotionService;
use App\Services\Datasets\WaterService;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

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

    }
}
