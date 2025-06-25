<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ColorsettingResource\Pages;
use App\Filament\Resources\ColorsettingResource\RelationManagers;
use App\Models\Colorsetting;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ColorsettingResource extends Resource
{
    protected static ?string $model = Colorsetting::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    public static function getPluralModelLabel(): string
    {
        return 'Color Settings';
    }
    public static function getModelLabel(): string
    {
        return 'Color Setting';
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
                            ->required()
                            ->default(true),

                    ]),
                Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('nama')
                            ->label('Template Color')
                            ->placeholder('Masukan Nama Template Warna')
                            ->required()
                            ->maxLength(255)
                            ->default(null),
                        Forms\Components\ColorPicker::make('header_color')
                            ->label('Header Color')
                            ->placeholder('Pilih Warna Header')
                            ->hex()
                            ->default(null),
                        Forms\Components\ColorPicker::make('header_runningtext_color')
                            ->label('Running Text Color')
                            ->placeholder('Pilih Warna Running Text')
                            ->hex()
                            ->default(null),
                        Forms\Components\ColorPicker::make('footer_color')
                            ->label('footer Color')
                            ->placeholder('Pilih Warna footer')
                            ->hex()
                            ->default(null),
                        Forms\Components\ColorPicker::make('footer_copyright_color')
                            ->label('Copyright Color')
                            ->placeholder('Pilih Warna Copyright')
                            ->hex()
                            ->default(null),
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
                    ->label('Status'),
                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama Template Color')
                    ->searchable(),
                Tables\Columns\ColorColumn::make('header_color')
                    ->label('Header Color')
                    ->copyable()
                    ->copyableState(fn (string $state): string => "Color: {$state}")
                    ->searchable(),
                Tables\Columns\ColorColumn::make('header_runningtext_color')
                    ->label('Running Text Color')
                    ->copyable()
                    ->copyableState(fn (string $state): string => "Color: {$state}")
                    ->searchable(),
                Tables\Columns\ColorColumn::make('footer_color')
                    ->label('Footer Color')
                    ->copyable()
                    ->copyableState(fn (string $state): string => "Color: {$state}")
                    ->searchable(),
                Tables\Columns\ColorColumn::make('footer_copyright_color')
                    ->label('Copyright Color')
                    ->copyable()
                    ->copyableState(fn (string $state): string => "Color: {$state}")
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
            'index' => Pages\ListColorsettings::route('/'),
            'create' => Pages\CreateColorsetting::route('/create'),
            'edit' => Pages\EditColorsetting::route('/{record}/edit'),
        ];
    }
}
