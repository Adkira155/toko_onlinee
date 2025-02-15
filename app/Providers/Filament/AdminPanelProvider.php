<?php

namespace App\Providers\Filament;

use Filament\Pages;
use Filament\Panel;
use App\Models\User;
use Filament\Widgets;
use App\Models\Produk;
use Filament\PanelProvider;
use Filament\Widgets\Widget;
use App\Models\SocialiteUser;
use Filament\Pages\Auth\Login;
use BladeUI\Icons\Components\Icon;
use Filament\Support\Colors\Color;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\FileUpload;
use Illuminate\Validation\Rules\Password;
use Rupadana\ApiService\ApiServicePlugin;
use Filament\Http\Middleware\Authenticate;
use Filament\Support\Facades\FilamentIcon;
use Jeffgreco13\FilamentBreezy\BreezyCore;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Filament\Http\Middleware\AuthenticateSession;
use DutchCodingCompany\FilamentSocialite\Provider;
use BezhanSalleh\FilamentShield\FilamentShieldPlugin;
use Illuminate\Routing\Middleware\SubstituteBindings;

//use App\Settings\KaidoSetting;

use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use DutchCodingCompany\FilamentSocialite\FilamentSocialitePlugin;
use Filament\Pages\Auth\EmailVerification\EmailVerificationPrompt;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
        ->brandLogo(asset('images/logo2.svg'))
            ->default()
            ->id('admin')
            ->path('dashboard')
            ->login()
            ->registration()
            ->passwordReset()
           ->emailVerification()
          ->databaseNotifications()

   //         ->profile()
            ->colors([
                'primary' => '#5783db',
                'danger' => '#dd7973',
                'gray' => Color::Gray,
                'info' => '#a881af',
                'success' => '#5dbea3',
                'warning' => '#ffbd03',
            ])
            // ->sidebarCollapsibleOnDesktop()
            ->sidebarCollapsibleOnDesktop(true)
            // ->collapsedSidebarWidth('9rem')
            //->topNavigation()
            // NavigationItem::make('User')
            // ->label(fn (): string => __('filament-panels::pages/auth/edit-profile.label'))
            // ->url(fn () => EditProfile::getUrl())
            // ->icon('heroicon-o-user-circle')
            // ->isActiveWhen(fn (): bool => request()->routeIs(EditProfile::getRouteName())),

            ->sidebarCollapsibleOnDesktop()
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
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
                FilamentSocialitePlugin::make()
                ->providers([
                        Provider::make('google')
                        ->label('Google')
                        ->icon('heroicon-o-sparkles')
                        ->color(Color::hex('#dd7973'))
                        ->outlined(true)
                        ->stateless(false)
                ])
                ->registration(true),

                ApiServicePlugin::make(),

                FilamentShieldPlugin::make()
                ->gridColumns([
                    'default' => 1,
                    'sm' => 1,
                    'lg' => 2
                ])
                ->sectionColumnSpan(1)
                ->checkboxListColumns([
                    'default' => 1,
                    'sm' => 2,
                    'lg' => 4,
                ])
                ->resourceCheckboxListColumns([
                    'default' => 1,
                    'sm' => 2,
                ]),

                BreezyCore::make()
                ->myProfile(
                    shouldRegisterNavigation: true,
                    navigationGroup: "Settings",
                    shouldRegisterUserMenu: true, // Sets the 'account' link in the panel User Menu (default = true)
                    hasAvatars: true, // Enables the avatar upload form component (default = false)
                    slug: 'my-profile'
                )
                ->avatarUploadComponent(fn($fileUpload) => $fileUpload->disableLabel())
                // OR, replace with your own component
                ->avatarUploadComponent(
                    fn() => FileUpload::make('avatar_url')
                        ->image()
                        ->disk('public'))
                ->enableTwoFactorAuthentication()
                ->passwordUpdateRules(
                    rules:[Password::default()],
                    requiresCurrentPassword: false,)
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);

            // if($this->settings->sso-enable ?? true){
            //     $plugins[] =
            //     FilamentSocialitePlugin::make()
            //     ->providers([
            //         Provider::make('google')
            //         ->label('Google')
            //         ->icon('fab-google')
            //         ->color(Color::hex('#a881af'))
            //         ->outlined(false)
            //         ->stateless(false)
            //     ])->registration(true);
            // }
    }
}
