<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NomortambahanResource\Pages;
use App\Filament\Resources\NomortambahanResource\RelationManagers;
use App\Models\Nomortambahan;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NomortambahanResource extends Resource
{
    protected static ?string $model = Nomortambahan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getPluralModelLabel(): string
    {
        return 'Kontak';
    }
    public static function getModelLabel(): string
    {
        return 'Kontak';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('order')
                    ->required()
                    ->numeric()
                    ->default(0)
                    ->hidden(),
                Section::make('Status')
                    ->schema([
                        Forms\Components\Toggle::make('is_active')
                            ->required()
                            ->label('Aktif')
                            ->default(true),
                    ]),
                Section::make('Informasi Kontak')
                    ->schema([
                        Forms\Components\TextInput::make('nama')
                            ->label('Nama Kontak')
                            ->required()
                            ->maxLength(100)
                            ->default(null),
                        Forms\Components\TextInput::make('nomor')
                            ->label('Nomor Kontak')
                            ->required()
                            ->maxLength(50)
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
                    ->sortable()
                    ->formatStateUsing(function ($state, $record, $column, $rowLoop) {
                        return $rowLoop->iteration; // ini akan mulai dari 1
                    }),
                Tables\Columns\ToggleColumn::make('is_active')
                    ->label('Status')
                    ->sortable(),
                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama Kontak') 
                    ->searchable(),
                Tables\Columns\TextColumn::make('nomor')
                    ->label('Nomor')
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
            'index' => Pages\ListNomortambahans::route('/'),
            'create' => Pages\CreateNomortambahan::route('/create'),
            'edit' => Pages\EditNomortambahan::route('/{record}/edit'),
        ];
    }
}
