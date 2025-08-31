<?php

namespace App\Filament\Resources;

use AlperenErsoy\FilamentExport\Actions\FilamentExportBulkAction;
use AlperenErsoy\FilamentExport\Actions\FilamentExportHeaderAction;
use App\Filament\Exports\KegiatanExporter;
use App\Filament\Resources\PengajuanKegiatanResource\Pages;
use App\Filament\Resources\PengajuanKegiatanResource\RelationManagers;
use App\Mail\PengajuanMasuk;
use App\Models\PengajuanKegiatan;
use Filament\Forms;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\CheckboxColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Mail;

class PengajuanKegiatanResource extends Resource
{
    protected static ?string $model = PengajuanKegiatan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getPluralModelLabel(): string
    {
        return 'Manajemen Pengajuan Kegiatan';
    }
    public static function getModelLabel(): string
    {
        return 'Manajemen Pengajuan Kegiatan';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('order')
                    ->hidden()
                    ->numeric()
                    ->default(0),
                Section::make()
                    ->schema([
                        Forms\Components\Toggle::make('is_active')
                            ->label('Status')
                            ->default(true)
                            ->required(),
                    ]),
                Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('nama')
                            ->label('Nama Pengaju')
                            ->placeholder('Masukan Nama Pengaju')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Textarea::make('alamat')
                            ->label('Alamat Pengaju')
                            ->placeholder('Masukan Alamat Pengaju')
                            ->rows(5)
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('email')
                            ->label('Email Pengaju')
                            ->placeholder('Masukan Email Pengaju')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('no_telp')
                            ->label('Nomor Telepon Pengaju')
                            ->placeholder('Masukan Nomor Telepon Pengaju')
                            ->tel()
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('keperluan')
                            ->label('Keperluan Pengajuan')
                            ->placeholder('Masukan Keperluan Pengajuan')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\DatePicker::make('tanggal')
                            ->label('Tanggal Pengajuan')
                            ->placeholder('Pilih Tanggal Pengajuan')
                            ->required(),
                        Forms\Components\TextInput::make('total_anggaran')
                            ->label('Total Anggaran')
                            ->placeholder('Masukan Total Anggaran')
                            ->required()
                            ->numeric(),
                        Forms\Components\Textarea::make('detail_Keperluan')
                            ->label('Detail Keperluan')
                            ->placeholder('Masukan Detail Keperluan')
                            ->rows(5)
                            ->columnSpanFull(),
                        // FileUpload::make('file_path')
                        //     ->label('File Pendukung')
                        //     ->disk('public') // pastikan disk public digunakan
                        //     ->directory('pengajuan-files') // folder tempat file disimpan
                        //     ->visibility('public')
                        //     ->downloadable() // agar bisa di-download dari edit form
                        //     ->preserveFilenames() // opsional: agar nama file asli tetap
                        //     ->maxSize(10240), // (opsional) bisa urutkan file
                    ]),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('order')
                    ->label('Urutan')
                    ->numeric()
                    ->sortable()
                    ->formatStateUsing(function ($state, $record, $column, $rowLoop) {
                        return $rowLoop->iteration; // ini akan mulai dari 1
                    }),
                Tables\Columns\ToggleColumn::make('is_active')
                    ->label('Status')
                    ->sortable(),
                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama Pengaju')
                    ->searchable(),
                Tables\Columns\TextColumn::make('alamat')
                    ->label('Alamat Pengaju')
                    ->limit(50) // batasi tampilan teks
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->label('Email Telepon Pengaju')
                    ->searchable(),
                Tables\Columns\TextColumn::make('no_telp')
                    ->label('Nomor Telepon Pengaju')
                    ->searchable(),
                Tables\Columns\TextColumn::make('keperluan')
                    ->label('Keperluan Pengajuan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal')
                    ->label('Tanggal Pengajuan')
                    ->date('d/m/Y')
                    ->sortable(),
                Tables\Columns\TextColumn::make('total_anggaran')
                    ->label('Total Anggaran')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('file_path')
                    ->label('File Pendukung')
                    ->searchable()
                    ->icon('heroicon-o-arrow-down-tray')
                    ->formatStateUsing(fn ($state) => 'Download') // Teks yang ditampilkan
                        ->url(fn ($record) => $record->file_path ? asset('storage/' . $record->file_path) : null),
                Tables\Columns\TextColumn::make('detail_Keperluan')
                    ->label('Detail Keperluan')
                    ->limit(50) // batasi tampilan teks
                    ->searchable(),
                CheckboxColumn::make('is_admin')
                    ->label('Dilihat')
                    ->beforeStateUpdated(function ($record, $state) {
                        // $state bernilai true atau false, tergantung checkbox
                        // Lakukan sesuatu jika ingin custom aksi sebelum update
                    })
                    ->afterStateUpdated(function ($record, $state) {
                        // Jika mau aksi setelah update, misalnya logging
                    })
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make()->icon('heroicon-o-eye')->label('Lihat Detail'),
                Tables\Actions\DeleteAction::make()
                    ->label('Hapus')
                    ->successNotificationTitle('Pengajuan Kegiatan Berhasil Dihapus')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->modalHeading('Hapus Pengajuan Kegiatan')
                    ->modalSubheading('Apakah Anda yakin ingin menghapus pengajuan ini?')
                    ->modalButton('Hapus Pengajuan'),
                // Tables\Actions\ExportAction::make()
                //     ->label('Ekspor')
                //     ->icon('heroicon-o-arrow-down-tray')
                //     ->color('primary')
                //     ->exporter(KegiatanExporter::class),
                Tables\Actions\Action::make('Kirim Email')
                    ->form([
                        Forms\Components\Textarea::make('catatan')
                            ->label('Catatan untuk penerima')
                            ->required()
                            ->maxLength(500),
                    ])
                    ->action(function (PengajuanKegiatan $record, array $data) {
                        if (empty($record->email)) {
                            Notification::make()
                                ->title('Gagal mengirim email: alamat email kosong.')
                                ->danger()
                                ->send();
                            return;
                        }
                        $kami = [
                            'nama' => 'Admin Bantuan',
                            'email' => 'admin@example.com',
                            'catatan' => $data['catatan'], // <-- catatan masuk ke data
                        ];

                        Mail::to($record->email)->send(new PengajuanMasuk($record, $kami));

                        Notification::make()
                            ->title('Email berhasil dikirim ke ' . $record->email)
                            ->success()
                            ->send();
                    }),
            ])
            ->headerActions([
                FilamentExportHeaderAction::make('export')
                ->label('Download Data')
                ->icon('heroicon-o-arrow-down-tray'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
                FilamentExportBulkAction::make('export'),
                
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPengajuanKegiatans::route('/'),
            'create' => Pages\CreatePengajuanKegiatan::route('/create'),
            'edit' => Pages\EditPengajuanKegiatan::route('/{record}/edit'),
        ];
    }
}
