<?php

namespace App\Providers\Filament;

use App\Filament\Pages\Auth\ForgotPassword;
use App\Filament\Pages\Auth\LoginCustom;
use App\Filament\Pages\Register;
use App\Filament\Resources\AcaraResource;
use App\Filament\Resources\AddmenukegiatanResource;
use App\Filament\Resources\AlamatResource;
use App\Filament\Resources\AlbumResource;
use App\Filament\Resources\AnggotaResource\Pages\DaftarAnggota;
use App\Filament\Resources\AnggotaResource\Pages\DaftarUser;
use App\Filament\Resources\BannermarketResource;
use App\Filament\Resources\BeritaResource;
use App\Filament\Resources\ColorsettingResource;
use App\Filament\Resources\DataanggotaResource;
use App\Filament\Resources\FotoStrukturResource;
use App\Filament\Resources\HukumResource;
use App\Filament\Resources\KolaborasiResource;
use App\Filament\Resources\KumpulanvideoResource;
use App\Filament\Resources\LokasiResource;
use App\Filament\Resources\MenukolaborasiResource;
use App\Filament\Resources\MisiResource;
use App\Filament\Resources\MVideoResource;
use App\Filament\Resources\NomortambahanResource;
use App\Filament\Resources\PasalResource;
use App\Filament\Resources\PengajuanBantuanResource;
use App\Filament\Resources\PengajuanKegiatanResource;
use App\Filament\Resources\ProgramkegiatanResource;
use App\Filament\Resources\RegisUserAnggotaResource\Pages\RegisterUserAnggota;
use App\Filament\Resources\RunningTextBerandaResource;
use App\Filament\Resources\SliderbrandaResource;
use App\Filament\Resources\SlideriklanResource;
use App\Filament\Resources\SosialMediaResource;
use App\Filament\Resources\TentangKamiResource;
use App\Filament\Resources\UsahamandiriResource;
use App\Filament\Resources\UserRegisResource\Pages\DaftarUserAnggota;
use App\Filament\Resources\ValueResource;
use App\Filament\Resources\VideoResource;
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
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    // public function getPages(): array
    // {
    //     return [
    //         Register::class,
    //         // page lain juga bisa ada di sini
    //     ];
    // }
    public function panel(Panel $panel): Panel
    {
        $dataprofil = \App\Models\tentangKami::where('is_active', 1)->orderBy('created_at','asc')->first();
        return $panel
            // ->brandLogo($dataprofil?->foto_profil ? asset('storage/' . $dataprofil?->foto_profil) : null)
            ->brandName('Admin'. ' ' .
                trim(($dataprofil?->first_name ?? '') . ' ' . ($dataprofil?->last_name ?? 'Nama Default'))
            )
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            // ->login(LoginCustom::class)
            ->colors([
                'primary' => Color::Amber,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
                Register::class,
                ForgotPassword::class,

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
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.running-text-berandas.*'))
                                ->url(fn(): string => RunningTextBerandaResource::getUrl()),
                            NavigationItem::make('Slider Branda')
                                ->icon('heroicon-s-information-circle')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.sliderbrandas.*'))
                                ->url(fn(): string => SliderbrandaResource::getUrl()),
                        ]),
                    NavigationGroup::make('Profil')
                        ->items([
                            NavigationItem::make('Tentang Kami')
                                ->icon('heroicon-s-information-circle')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.tentang-kamis.*'))
                                ->url(fn(): string => TentangKamiResource::getUrl()),
                            NavigationItem::make('Visi')
                                ->icon('heroicon-s-information-circle')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.visis.*'))
                                ->url(fn(): string => VisiResource::getUrl()),
                            NavigationItem::make('Misi')
                                ->icon('heroicon-s-information-circle')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.Misis.*'))
                                ->url(fn(): string => MisiResource::getUrl()),
                            NavigationItem::make('Value')
                                ->icon('heroicon-s-information-circle')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.values.*'))
                                ->url(fn(): string => ValueResource::getUrl()),
                            NavigationItem::make('Dasar Hukum')
                                ->icon('heroicon-s-information-circle')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.hukums.*'))
                                ->url(fn(): string => HukumResource::getUrl()),
                            NavigationItem::make('Pasal-Pasal')
                                ->icon('heroicon-s-information-circle')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.pasals.*'))
                                ->url(fn(): string => PasalResource::getUrl()),
                    ]),
                    NavigationGroup::make('Struktur Organisasi')
                        ->items([
                            NavigationItem::make('Foto Struktur Organisasi')
                                ->icon('heroicon-s-information-circle')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.foto-strukturs.*'))
                                ->url(fn(): string => FotoStrukturResource::getUrl()),

                            NavigationItem::make('Data Anggota')
                                ->icon('heroicon-s-information-circle')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.dataanggotas.*'))
                                ->url(fn(): string => DataanggotaResource::getUrl()),
                            
                        ]),
                    NavigationGroup::make('Program Kegiatan')
                        ->items([
                            NavigationItem::make('Tambah Menu Program')
                                ->icon('heroicon-s-information-circle')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.addmenukegiatans.*'))
                                ->url(fn(): string => AddmenukegiatanResource::getUrl()),
                            NavigationItem::make('Program Kegiatan')
                                ->icon('heroicon-s-information-circle')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.programkegiatans.*'))
                                ->url(fn(): string => ProgramkegiatanResource::getUrl()),
                            NavigationItem::make('Manajemen Program Kegiatan')
                                ->icon('heroicon-s-information-circle')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.pengajuan-kegiatans.*'))
                                ->url(fn(): string => PengajuanKegiatanResource::getUrl()),
                            
                        ]),
                    NavigationGroup::make('Program Usaha Mandiri')
                        ->items([
                            NavigationItem::make('Slider Iklan')
                                ->icon('heroicon-s-information-circle')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.slideriklans.*'))
                                ->url(fn(): string => SlideriklanResource::getUrl()),
                            NavigationItem::make('Banner Market')
                                ->icon('heroicon-s-information-circle')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.bannermarkets.*'))
                                ->url(fn(): string => BannermarketResource::getUrl()),
                            NavigationItem::make('Produk')
                                ->icon('heroicon-s-information-circle')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.usahamandiris.*'))
                                ->url(fn(): string => UsahamandiriResource::getUrl()),
                            
                        ]),
                    NavigationGroup::make('Program Kolaborasi')
                        ->items([
                            NavigationItem::make('Tambah Menu Kolaborasi')
                                ->icon('heroicon-s-information-circle')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.menukolaborasis.*'))
                                ->url(fn(): string => MenukolaborasiResource::getUrl()),
                            NavigationItem::make('Kolaborasi')
                                ->icon('heroicon-s-information-circle')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.kolaborasis.*'))
                                ->url(fn(): string => KolaborasiResource::getUrl()),
                            
                        ]),
                    NavigationGroup::make('Media')
                        ->items([
                            NavigationItem::make('Foto')
                                ->icon('heroicon-s-information-circle')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.albums.*'))
                                ->url(fn(): string => AlbumResource::getUrl()),
                            
                            NavigationItem::make('Video')
                                ->icon('heroicon-s-information-circle')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.kumpulanvideos.*'))
                                ->url(fn(): string => KumpulanvideoResource::getUrl()),
                            
                        ]),
                    NavigationGroup::make()
                        ->items([
                            NavigationItem::make('Acara')
                                ->icon('heroicon-s-information-circle')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.acaras.*'))
                                ->url(fn(): string => AcaraResource::getUrl()),
                            
                            NavigationItem::make('Berita')
                                ->icon('heroicon-s-information-circle')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.beritas.*'))
                                ->url(fn(): string => BeritaResource::getUrl()),

                            NavigationItem::make('Alamat Organisasi')
                                ->icon('heroicon-s-information-circle')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.alamats.*'))
                                ->url(fn(): string => AlamatResource::getUrl()),

                            NavigationItem::make('Pesan Bantuan')
                                ->icon('heroicon-s-information-circle')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.pengajuan-bantuans.index'))
                                ->url(fn(): string => PengajuanBantuanResource::getUrl()),

                            NavigationItem::make('Nomor Bantuan')
                                ->icon('heroicon-s-information-circle')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.nomortambahans.*'))
                                ->url(fn(): string => NomortambahanResource::getUrl()),

                            NavigationItem::make('Maps')
                                ->icon('heroicon-s-information-circle')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.lokasis.*'))
                                ->url(fn(): string => LokasiResource::getUrl()),
                            NavigationItem::make('Sosial Media')
                                ->icon('heroicon-s-information-circle')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.' . SosialMediaResource::getSlug() . '.*'))
                                ->url(fn(): string => SosialMediaResource::getUrl()),
                            
                        ]),
                    
                    NavigationGroup::make('Pengaturan')
                        ->items([
                            NavigationItem::make('Color setting')
                                ->icon('heroicon-s-cog')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.resources.colorsettings.*'))
                                ->url(fn(): string => ColorsettingResource::getUrl()),
                            NavigationItem::make('Registrasi Akun')
                                ->icon('heroicon-o-user-plus')
                                ->url(Register::getUrl())
                                ->visible(fn () => Auth::user()?->email === 'admin@karangtaruna.com')
                                ->isActiveWhen(fn (): bool => request()->routeIs(Register::getRouteName())),
                            NavigationItem::make('Daftar Akun Anggota')
                                ->icon('heroicon-o-user-plus')
                                // ->url(DaftarAnggota::getUrl())
                                ->visible(fn () => Auth::user()?->email === 'admin@karangtaruna.com'),
                                // ->isActiveWhen(fn (): bool => request()->routeIs(DaftarAnggota::getRouteName())),
                            NavigationItem::make('change password')
                                ->icon('heroicon-o-key')
                                ->url(ForgotPassword::getUrl())
                                // ->visible(fn () => Auth::user()?->email === 'admin@karangtaruna.com')
                                ->isActiveWhen(fn () => request()->routeIs(ForgotPassword::getRouteName())),
                        ]),
                  
                ]);
            })
                
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
