<?php

namespace App\Providers;

use App\Actions\Fortify\Auth\Patient\AttemptToAuthenticate;
use App\Actions\Fortify\Auth\Patient\RedirectIfTwoFactorAuthenticatable;
use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\DoctorController;
use App\Http\Controllers\Auth\PatientController;
use App\Http\Controllers\PharmacyController;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{

    private function loadAuthMigrations(): void
    {
        $this->loadMigrationsFrom(base_path("/database/migrations/auth"));
    }
    /**
     * Register services.
     */
    public function register(): void
    {

        //load migrations
        $this->loadAuthMigrations();

        //link every guard with it's classes

        //when classes needs the guard interface
        //we will give them the right guard

        $this->app->when([
            PatientController::class,
            RedirectIfTwoFactorAuthenticatable::class,
            AttemptToAuthenticate::class,
            AuthController::class
        ])->needs(StatefulGuard::class)
            ->give(function(){
                return Auth::guard("patient");
            });

        $this->app->when([
            DoctorController::class,
            \App\Actions\Fortify\Auth\Doctor\RedirectIfTwoFactorAuthenticatable::class,
            \App\Actions\Fortify\Auth\Doctor\AttemptToAuthenticate::class,
        ])->needs(StatefulGuard::class)
            ->give(function(){
                return Auth::guard("doctor");
            });

        $this->app->when([
            PharmacyController::class,
            \App\Actions\Fortify\Auth\Pharmacy\RedirectIfTwoFactorAuthenticatable::class,
            \App\Actions\Fortify\Auth\Pharmacy\AttemptToAuthenticate::class,
        ])->needs(StatefulGuard::class)
            ->give(function(){
                return Auth::guard("pharmacy");
            });

        $this->app->when([
            AdminController::class,
            \App\Actions\Fortify\Auth\Admin\RedirectIfTwoFactorAuthenticatable::class,
            \App\Actions\Fortify\Auth\Admin\AttemptToAuthenticate::class
        ])->needs(StatefulGuard::class)
            ->give(function(){
                return Auth::guard("admin");
            });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {

    }
}
