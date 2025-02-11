<?php

namespace App\Providers\Filament;

use Filament\Pages;
use Filament\Panel;
use App\Models\User;
use Filament\Widgets;
use App\Models\Produk;
use BladeUI\Icons\Components\Icon;
use Filament\PanelProvider;
use Filament\Widgets\Widget;
use Filament\Support\Colors\Color;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\FileUpload;
use Filament\Http\Middleware\Authenticate;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Filament\Http\Middleware\AuthenticateSession;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Support\Facades\FilamentIcon;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Jeffgreco13\FilamentBreezy\BreezyCore;
use Illuminate\Validation\Rules\Password;

use function Livewire\after;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
        ->brandLogo(asset('images/logo2.svg'))
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()

            // ->registration()
            // ->passwordReset()
            // ->emailVerification()
            // ->profile()

            ->colors([
                'primary' => '#5783db',
                'danger' => '#dd7973',
                'gray' => Color::Gray,
                'info' => '#a881af',
                'success' => '#5dbea3',
                'warning' => '#ffbd03',
            ])
            ->sidebarCollapsibleOnDesktop()
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            // ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
            ])
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
            ->plugins([
                BreezyCore::make()
                ->myProfile(
                    shouldRegisterUserMenu: true,
                    shouldRegisterNavigation: true,
                    slug: 'my-profile',

                    // Avatar
                        userMenuLabel: 'My Profile', // Customizes the 'account' link label in the panel User Menu (default = null)
                        navigationGroup: 'Settings', // Sets the navigation group for the My Profile page (default = null)
                        hasAvatars: true, // Enables the avatar upload form component (default = false)
                )

                ->avatarUploadComponent(fn($fileUpload) => $fileUpload->disableLabel())
                ->avatarUploadComponent(fn() => FileUpload::make('avatar_url')->disk('public'))

                ->enableTwoFactorAuthentication()
                ->passwordUpdateRules(
                    rules:[Password::default()->mixedCase()->uncompromised(3)],
                    requiresCurrentPassword: true,
                )
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);

    }
}
