<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SlideriklanResource\Pages;
use App\Filament\Resources\SlideriklanResource\RelationManagers;
use App\Models\Slideriklan;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SlideriklanResource extends Resource
{
    protected static ?string $model = Slideriklan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getModelLabel(): string
    {
        return 'Slider Iklan';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Slider Iklan';
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
                        Forms\Components\TextInput::make('nama_iklan')
                            ->label('Nama Iklan')
                            ->placeholder('Masukan Nama Iklan')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\FileUpload::make('gambar')
                            ->label('Gambar Iklan')
                            ->placeholder('Masukan Gambar (Ukuran width 1519px, height 524px)')
                            ->image()
                            ->imageEditor()
                            ->imageEditorViewportWidth('1519')
                            ->imageEditorViewportHeight('524')
                            ->required()
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/jpg']) // hanya file tipe ini
                            ->rules(['mimes:jpg,jpeg,png']),
                        Forms\Components\TextInput::make('deskripsi')
                            ->label('Deskripsi')
                            ->placeholder('Masukan Deskripsi Gambar')
                            ->required()
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
                    ->label('Urutan')
                    ->numeric()
                    ->formatStateUsing(function ($state, $record, $column, $rowLoop) {
                        return $rowLoop->iteration; // ini akan mulai dari 1
                    })
                    ->sortable(),
                Tables\Columns\ToggleColumn::make('is_active')
                    ->label('Status'),
                Tables\Columns\TextColumn::make('nama_iklan')
                    ->label('Nama Iklan')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\ImageColumn::make('gambar')
                    ->label('Gambar')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('deskripsi')
                    ->label('Deskripsi')
                    ->sortable()
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
            'index' => Pages\ListSlideriklans::route('/'),
            'create' => Pages\CreateSlideriklan::route('/create'),
            'edit' => Pages\EditSlideriklan::route('/{record}/edit'),
        ];
    }
}
