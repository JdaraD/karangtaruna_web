<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DataanggotaResource\Pages;
use App\Filament\Resources\DataanggotaResource\RelationManagers;
use App\Models\Dataanggota;
use Dom\Text;
use Filament\Forms;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DataanggotaResource extends Resource
{
    protected static ?string $model = Dataanggota::class;

    public static function getPluralModelLabel(): string
    {
        return 'Data Anggota';
    }

    public static function getModelLabel(): string
    {
        return 'Data Anggota';
    }
    

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('order')
                    ->default(0)
                    ->hidden(),

                Section::make()
                    ->schema([
                        Forms\Components\Toggle::make('is_active')
                            ->required()
                            ->label('Status')
                            ->default(true),
                    ]),
                Section::make()
                    ->schema([
                        TextInput::make('name')
                            ->label('Nama')
                            ->placeholder('Masukan Nama Anggota')
                            ->required()
                            ->maxLength(100),
                        Forms\Components\FileUpload::make('image')
                            ->label('Foto')
                            ->preserveFilenames()
                            ->placeholder('Upload Foto Anggota')
                            ->image()
                            ->required()
                            ->maxSize(2024)
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/jpg']) // hanya file tipe ini
                            ->rules(['mimes:jpg,jpeg,png']),
                        TextInput::make('alamat')
                            ->label('Alamat')
                            ->placeholder('Masukan Alamat Anggota')
                            ->required()
                            ->maxLength(1000),
                        Select::make('jabatan')
                            ->label('Jabatan')
                            ->searchable()
                            ->options([
                                'Struktural' => [
                                    'Ketua' => 'Ketua',
                                    'Wakil Ketua' => 'Wakil Ketua',
                                    'Sekertaris I' => 'Sekertaris I',
                                    'Sekertaris II' => 'Sekertaris II',
                                    'Sekertaris III' => 'Sekertaris III',
                                    'Bendahara I' => 'Bendahara I',
                                    'Bendahara II' => 'Bendahara II',
                                    'Bendahara III' => 'Bendahara III',
                                    'Ketua Divisi' => 'Ketua Divisi',
                                    'Anggota' => 'Anggota',
                                ],
                            ]),
                        textInput::make('keterangan_jabatan')
                            ->label('Keterangan Jabatan')
                            ->placeholder('Keterangan Jabatan')
                            ->required()
                            ->maxLength(100),
                        TextInput::make('no_hp')
                            ->label('Nomor HP')
                            ->placeholder('Masukan Nomor HP Anggota')
                            ->required()
                            ->tel()
                            ->maxLength(20),
                        TextInput::make('email')
                            ->label('Email')
                            ->placeholder('Masukan Email Anggota')
                            ->required()
                            ->email()
                            ->maxLength(255)
                            ->default(null),
                        Forms\Components\Textarea::make('description')
                            ->placeholder('Masukan Deskripsi Anggota')
                            ->label('Deskripsi')
                            ->maxLength(1000)
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('order')
                    ->numeric()
                    ->sortable()
                    ->hidden(),
                Tables\Columns\ToggleColumn::make('is_active')
                    ->label('Status')
                    ->sortable(),
                TextColumn::make('name')
                    ->label('Nama Anggota')
                    ->sortable(),
                TextColumn::make('jabatan')
                    ->label('Jabatan')
                    ->sortable(),
                TextColumn::make('keterangan_jabatan')
                    ->label('Keterangan Jabatan')
                    ->limit(50)
                    ->searchable(),
                TextColumn::make('no_hp')
                    ->label('Nomor HP')
                    ->sortable(),
                TextColumn::make('email')
                    ->label('Email')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('description')
                    ->label('Deskripsi')
                    ->limit(50)
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                ImageColumn::make('image')
                    ->label('foto'),
                TextColumn::make('created_at')
                    ->label('Dibuat Pada')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('updated_at')
                    ->label('Diperbarui Pada')
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
            'index' => Pages\ListDataanggotas::route('/'),
            'create' => Pages\CreateDataanggota::route('/create'),
            'edit' => Pages\EditDataanggota::route('/{record}/edit'),
        ];
    }
}
