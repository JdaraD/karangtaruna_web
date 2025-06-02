<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RunningTextBerandaResource\Pages;
use App\Filament\Resources\RunningTextBerandaResource\RelationManagers;
use App\Models\RunningText;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RunningTextBerandaResource extends Resource
{
    protected static ?string $model = RunningText::class;

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
                        Toggle::make('is_active')
                            ->label('Status')
                            ->default(true)
                            ->required(),
                    ]),
                Section::make()
                    ->schema([
                        TextInput::make('title')
                            ->label('Judul')
                            ->placeholder('Masukan Judul')
                            ->required()
                            ->maxLength(1000),
                        TextInput::make('description')
                            ->label('Deskripsi')
                            ->placeholder('Masukan Deskripsi')
                            ->required()
                            ->maxLength(1000),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('order')
                    ->numeric()
                    ->hidden()
                    ->sortable(),
                ToggleColumn::make('is_active')
                    ->label('Status'),
                TextColumn::make('title')
                    ->label('Judul')
                    ->limit(20)
                    ->toolTip(fn($record) => $record->title)
                    ->searchable(),
                TextColumn::make('description')
                    ->label('Deskripsi')
                    ->limit(20)
                    ->toolTip(fn($record) => $record->title)
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
            ->reorderable('order')
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
            'index' => Pages\ListRunningTextBerandas::route('/'),
            'create' => Pages\CreateRunningTextBeranda::route('/create'),
            'edit' => Pages\EditRunningTextBeranda::route('/{record}/edit'),
        ];
    }
}
