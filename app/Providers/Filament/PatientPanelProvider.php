<?php

namespace App\Providers\Filament;

use App\Actions\Filament\Auth\Patient\Login;
use App\Actions\Filament\Auth\Patient\Register;
use App\Filament\Patient\Pages\Chat;
use App\Filament\Patient\Pages\Dashboard;
use App\Filament\Patient\Pages\Settings;
use App\Filament\Patient\Widgets\HealthState;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\MenuItem;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class PatientPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('patient')
            ->path('/workspace')
            ->authGuard('patient')
            ->login(Login::class)
            ->registration(Register::class)
            ->emailVerification()
            ->passwordReset()
            ->profile(isSimple: false)
            ->userMenuItems([
                MenuItem::make()
                    ->label('Settings')
                    ->icon('heroicon-o-adjustments-horizontal')
                    ->openUrlInNewTab(true)
                    ->url('/settings')

            ])
            ->databaseNotifications()
            ->brandLogo(asset('/images/aisha.png'))
            ->brandLogoHeight('4rem')
            ->databaseNotificationsPolling('5s')
            ->colors([
                'primary' => Color::Amber,
            ])
            ->discoverResources(in: app_path('Filament/Patient/Resources'), for: 'App\\Filament\\Patient\\Resources')
            ->discoverPages(in: app_path('Filament/Patient/Pages'), for: 'App\\Filament\\Patient\\Pages')
            ->pages([
                Chat::class,
                Settings::class
            ])
            ->discoverWidgets(in: app_path('Filament/Patient/Widgets'), for: 'App\\Filament\\Patient\\Widgets')
            ->widgets([
                HealthState::class
            ])
            ->viteTheme('resources/css/app.css', 'build')
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
