<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PhotoResource\Pages;
use App\Filament\Resources\PhotoResource\RelationManagers;
use App\Models\Photo;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PhotoResource extends Resource
{
    protected static ?string $model = Photo::class;

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
                            ->default('ture')
                            ->required(),
                    ]),
                Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('album_id')
                            ->required()
                            ->numeric(),
                        Forms\Components\FileUpload::make('gambar')
                            ->label('Gambar')
                            ->reorderable()
                            ->directory('photos')
                            ->disk('public')
                            ->placeholder('Masukan Gambar')
                            ->required()
                            ->image()
                            ->maxSize(2024)
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/jpg']) // hanya file tipe ini
                            ->rules(['mimes:jpg,jpeg,png']),
                        Forms\Components\TextInput::make('deskripsi')
                            ->label('Deskripsi')
                            ->placeholder('Masukan Deskripsi')
                            ->maxLength(255)
                            ->default(null),
                    ]),
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('order')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\ToggleColumn::make('is_active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('album_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('gambar')
                    ->searchable(),
                Tables\Columns\TextColumn::make('deskripsi')
                    ->searchable(),
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
            'index' => Pages\ListPhotos::route('/'),
            'create' => Pages\CreatePhoto::route('/create'),
            'edit' => Pages\EditPhoto::route('/{record}/edit'),
        ];
    }
}
