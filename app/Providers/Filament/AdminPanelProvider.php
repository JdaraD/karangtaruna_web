<?php

namespace App\Providers\Filament;

use App\Filament\Resources\AlamatResource;
use App\Filament\Resources\DataanggotaResource;
use App\Filament\Resources\FotoStrukturResource;
use App\Filament\Resources\HukumResource;
use App\Filament\Resources\MisiResource;
use App\Filament\Resources\NomortambahanResource;
use App\Filament\Resources\PasalResource;
use App\Filament\Resources\RunningTextBerandaResource;
use App\Filament\Resources\TentangKamiResource;
use App\Filament\Resources\ValueResource;
use App\Filament\Resources\VisiResource;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\NavigationBuilder;
use Filament\Navigation\NavigationGroup;
use Filament\Navigation\NavigationItem;
use Filament\Pages;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->colors([
                'primary' => Color::Amber,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
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
            ->navigation(function (NavigationBuilder $builder): NavigationBuilder{
                return $builder->groups([
                    NavigationGroup::make()
                        ->items([
                            NavigationItem::make('Dashboard')
                                ->icon('heroicon-s-home')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.pages.dashboard'))
                                ->url(fn(): string => Dashboard::getUrl()),
                        ]),
                    NavigationGroup::make('Beranda')
                        ->items([
                            NavigationItem::make('Running Text')
                                ->icon('heroicon-s-information-circle')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.RunningTextBeranda.index'))
                                ->url(fn(): string => RunningTextBerandaResource::getUrl()),
                        ]),
                    NavigationGroup::make('Profil')
                        ->items([
                            NavigationItem::make('Tentang Kami')
                                ->icon('heroicon-s-information-circle')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.tentangKamiBeranda.index'))
                                ->url(fn(): string => TentangKamiResource::getUrl()),
                            NavigationItem::make('Visi')
                                ->icon('heroicon-s-information-circle')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.VisiBeranda.index'))
                                ->url(fn(): string => VisiResource::getUrl()),
                            NavigationItem::make('Misi')
                                ->icon('heroicon-s-information-circle')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.MisiBeranda.index'))
                                ->url(fn(): string => MisiResource::getUrl()),
                            NavigationItem::make('Value')
                                ->icon('heroicon-s-information-circle')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.MisiBeranda.index'))
                                ->url(fn(): string => ValueResource::getUrl()),
                            NavigationItem::make('Dasar Hukum')
                                ->icon('heroicon-s-information-circle')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.RunningTextBeranda.index'))
                                ->url(fn(): string => HukumResource::getUrl()),
                            NavigationItem::make('Pasal-Pasal')
                                ->icon('heroicon-s-information-circle')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.RunningTextBeranda.index'))
                                ->url(fn(): string => PasalResource::getUrl()),
                    ]),
                    NavigationGroup::make('Struktur Organisasi')
                        ->items([
                            NavigationItem::make('Foto Struktur Organisasi')
                                ->icon('heroicon-s-information-circle')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.imageStruktur.index'))
                                ->url(fn(): string => FotoStrukturResource::getUrl()),

                            NavigationItem::make('Data Anggota')
                                ->icon('heroicon-s-information-circle')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.RunningTextBeranda.index'))
                                ->url(fn(): string => DataanggotaResource::getUrl()),
                            
                        ]),
                    NavigationGroup::make('Program Kegiatan')
                        ->items([
                            NavigationItem::make('Running Text')
                                ->icon('heroicon-s-information-circle')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.RunningTextBeranda.index'))
                                // ->url(fn(): string => RunningTextBerandaResource::getUrl()),
                            
                        ]),
                    NavigationGroup::make('Program Usaha Mandiri')
                        ->items([
                            NavigationItem::make('Slider Iklan')
                                ->icon('heroicon-s-information-circle')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.RunningTextBeranda.index')),
                                // ->url(fn(): string => RunningTextBerandaResource::getUrl()),
                            NavigationItem::make('Produk')
                                ->icon('heroicon-s-information-circle')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.RunningTextBeranda.index')),
                                // ->url(fn(): string => RunningTextBerandaResource::getUrl()),
                            
                        ]),
                    NavigationGroup::make('Program Kolaborasi')
                        ->items([
                            NavigationItem::make('Berita ')
                                ->icon('heroicon-s-information-circle')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.RunningTextBeranda.index'))
                                // ->url(fn(): string => RunningTextBerandaResource::getUrl()),
                            
                        ]),
                    NavigationGroup::make('Media')
                        ->items([
                            NavigationItem::make('Foto')
                                ->icon('heroicon-s-information-circle')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.RunningTextBeranda.index')),
                                // ->url(fn(): string => RunningTextBerandaResource::getUrl()),
                            
                            NavigationItem::make('Video')
                                ->icon('heroicon-s-information-circle')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.RunningTextBeranda.index')),
                                // ->url(fn(): string => RunningTextBerandaResource::getUrl()),
                            
                        ]),
                    NavigationGroup::make()
                        ->items([
                            NavigationItem::make('Event')
                                ->icon('heroicon-s-information-circle')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.RunningTextBeranda.index')),
                                // ->url(fn(): string => RunningTextBerandaResource::getUrl()),
                            
                            NavigationItem::make('Berita')
                                ->icon('heroicon-s-information-circle')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.RunningTextBeranda.index')),
                                // ->url(fn(): string => RunningTextBerandaResource::getUrl()),

                            NavigationItem::make('Alamat Organisasi')
                                ->icon('heroicon-s-information-circle')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.RunningTextBeranda.index'))
                                ->url(fn(): string => AlamatResource::getUrl()),

                            NavigationItem::make('Pesan')
                                ->icon('heroicon-s-information-circle')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.RunningTextBeranda.index')),
                                // ->url(fn(): string => RunningTextBerandaResource::getUrl()),

                            NavigationItem::make('Nomor Bantuan')
                                ->icon('heroicon-s-information-circle')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.RunningTextBeranda.index'))
                                ->url(fn(): string => NomortambahanResource::getUrl()),
                            
                        ]),
                    
                    NavigationGroup::make('Pengaturan')
                        ->items([
                            NavigationItem::make('Color setting')
                                ->icon('heroicon-s-cog')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.RunningTextBeranda.index')),
                                // ->url(fn(): string => RunningTextBerandaResource::getUrl()),
                        ]),
                  
                ]);
            })
                
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
