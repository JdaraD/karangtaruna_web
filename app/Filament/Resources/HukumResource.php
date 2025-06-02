<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HukumResource\Pages;
use App\Filament\Resources\HukumResource\RelationManagers;
use App\Models\Hukum;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HukumResource extends Resource
{
    protected static ?string $model = Hukum::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    public static function getPluralModelLabel(): string
    {
        return 'Dasar Hukum';
    }
    public static function getModelLabel(): string
    {
        return 'Dasar Hukum';
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
                Section::make()
                    ->schema([
                        Forms\Components\Toggle::make('is_active')
                            ->label('Status')
                            ->default(true)    
                            ->required(),
                    ]),
                Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('hukum')
                            ->required()
                            ->maxLength(1000),
                        Forms\Components\TextInput::make('description')
                            ->maxLength(1000)
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
                    ->label('Status'), 
                Tables\Columns\TextColumn::make('hukum')
                    ->label('Hukum')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
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
            'index' => Pages\ListHukums::route('/'),
            'create' => Pages\CreateHukum::route('/create'),
            'edit' => Pages\EditHukum::route('/{record}/edit'),
        ];
    }
}
