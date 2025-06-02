<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ValueResource\Pages;
use App\Filament\Resources\ValueResource\RelationManagers;
use App\Models\Value;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ValueResource extends Resource
{
    protected static ?string $model = Value::class;

    public static function getPluralModelLabel(): string
    {
        return 'Value';
    }
    public static function getModelLabel(): string
    {
        return 'Value';
    }

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('order')
                    ->hidden()
                    ->numeric()
                    ->default(0),
                Section::make()
                    ->schema([
                        Toggle::make('is_active')
                        ->label('Status')
                        ->default(true)
                        ->required(),
                    ]),
                Section::make()
                    ->schema([
                        TextInput::make('title')
                            ->label('Judul')
                            ->placeholder('Masukan Deskripsi')
                            ->required()
                            ->maxLength(1000),
                        TextInput::make('description')
                            ->label('Deskripsi')
                            ->placeholder('Masukan Deskripsi')
                            ->required()
                            ->maxLength(1000),
                    ]),
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('order')
                    ->label('Urutan')
                    ->formatStateUsing(function ($state, $record, $column, $rowLoop) {
                        return $rowLoop->iteration; // ini akan mulai dari 1
                    })
                    ->searchable(),
                Tables\Columns\ToggleColumn::make('is_active')
                    ->label('Status'),
                TextColumn::make('title')
                    ->label('Judul')
                    ->searchable(),
                TextColumn::make('description')
                    ->label('Deskripsi')
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
            'index' => Pages\ListValues::route('/'),
            'create' => Pages\CreateValue::route('/create'),
            'edit' => Pages\EditValue::route('/{record}/edit'),
        ];
    }
}
