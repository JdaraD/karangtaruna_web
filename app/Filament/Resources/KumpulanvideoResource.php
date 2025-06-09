<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KumpulanvideoResource\Pages;
use App\Filament\Resources\KumpulanvideoResource\RelationManagers;
use App\Models\Kumpulanvideo;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KumpulanvideoResource extends Resource
{
    protected static ?string $model = Kumpulanvideo::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
        public static function getPluralModelLabel(): string
    {
        return 'Video';
    }
    public static function getModelLabel(): string
    {
        return 'Video';
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
                        Forms\Components\TextInput::make('nama_video')
                            ->label('Nama Video')
                            ->placeholder('Masukan Nama Video')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Textarea::make('video')
                            ->label('Video')
                            ->placeholder('Masukan Url Video')
                            ->rows(5)
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('deskripsi')
                            ->label('Deskripsi')
                            ->placeholder('Masukan Deskripsi')
                            ->required()
                            ->maxLength(255),
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
                Tables\Columns\TextColumn::make('nama_video')
                    ->label('Nama Video')
                    ->searchable(),
                Tables\Columns\TextColumn::make('video')
                    ->label('Link Video')
                    ->searchable(),
                Tables\Columns\TextColumn::make('deskripsi')
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
            'index' => Pages\ListKumpulanvideos::route('/'),
            'create' => Pages\CreateKumpulanvideo::route('/create'),
            'edit' => Pages\EditKumpulanvideo::route('/{record}/edit'),
        ];
    }
}
