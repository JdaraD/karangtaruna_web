<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PengajuanBantuanResource\Pages;
use App\Filament\Resources\PengajuanBantuanResource\RelationManagers;
use App\Models\PengajuanBantuan;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\CheckboxColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PengajuanBantuanResource extends Resource
{
    protected static ?string $model = PengajuanBantuan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
        public static function getPluralModelLabel(): string
    {
        return 'Pesan Pengajuan Bantuan';
    }
    public static function getModelLabel(): string
    {
        return 'Pesan Pengajuan Bantuan';
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
                        Forms\Components\Textarea::make('detail_Keperluan')
                            ->label('Detail Keperluan')
                            ->placeholder('Masukan Detail Keperluan')
                            ->rows(5)
                            ->columnSpanFull(),
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
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListPengajuanBantuans::route('/'),
            'create' => Pages\CreatePengajuanBantuan::route('/create'),
            'edit' => Pages\EditPengajuanBantuan::route('/{record}/edit'),
        ];
    }
}
