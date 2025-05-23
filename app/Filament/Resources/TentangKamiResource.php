<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TentangKamiResource\Pages;
use App\Filament\Resources\TentangKamiResource\RelationManagers;
use App\Models\TentangKami;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TentangKamiResource extends Resource
{
    protected static ?string $model = TentangKami::class;

    public static function getPluralModelLabel(): string
    {
        return 'Tentang Kami';
    }
    public static function getModelLabel(): string
    {
        return 'Tentang Kami';
    }

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

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
                        TextInput::make('first_name')
                            ->label('Nama Depan')
                            ->placeholder('Masukan Nama Depan')
                            ->required()
                            ->maxLength(1000),
                        TextInput::make('last_name')
                            ->label('Nama Belakang')
                            ->placeholder('Masukan Nama Belakang')
                            ->required()
                            ->maxLength(1000),
                        TextInput::make('description')
                            ->label('Deskripsi')
                            ->placeholder('Masukan Deskripsi')
                            ->required()
                            ->maxLength(1000),
                        FileUpload::make('foto_profil')
                            ->label('Gambar')
                            ->image()
                            ->placeholder('Upload Gambar')
                            ->preserveFilenames()
                            ->maxSize(2024)
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/jpg']) // hanya file tipe ini
                            ->rules(['mimes:jpg,jpeg,png']),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('order')
                    ->numeric()
                    ->hidden()
                    ->sortable(),
                Tables\Columns\ToggleColumn::make('is_active')
                    ->label('Status'),
                Tables\Columns\TextColumn::make('first_name')
                    ->label('Nama Depan')
                    ->sortable(),
                Tables\Columns\TextColumn::make('last_name')
                    ->label('Nama Belakang')
                    ->sortable(),
                Tables\Columns\TextColumn::make('description')
                    ->label('Deskripsi')
                    ->limit(50)
                    ->sortable(),
                ImageColumn::make('foto_profil')
                    ->label('Gambar')
                    ->getStateUsing(fn ($record) => asset('storage/' . $record->foto_profil)),
            ])->filters([
                //
            ])->headerActions([
                //
            ])->actions([
                //
            ])->bulkActions([
                //
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
            'index' => Pages\ListTentangKamis::route('/'),
            'create' => Pages\CreateTentangKami::route('/create'),
            'edit' => Pages\EditTentangKami::route('/{record}/edit'),
        ];
    }
}
