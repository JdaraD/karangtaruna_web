<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FotoStrukturResource\Pages;
use App\Filament\Resources\FotoStrukturResource\RelationManagers;
use App\Models\FotoStruktur;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FotoStrukturResource extends Resource
{
    protected static ?string $model = FotoStruktur::class;

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
                        Forms\Components\FileUpload::make('foto_struktur')
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                    '16:10',
                                    '4:3',
                                    '1:1',
                                ])
                            ->image()
                            ->label('gambar')
                            ->placeholder('Masukan Gambar')
                            ->required()
                            ->maxSize(2024)
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/jpg']) // hanya file tipe ini
                            ->rules(['mimes:jpg,jpeg,png'])
                            ->preserveFilenames(),
                        Forms\Components\TextInput::make('description')
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
                Tables\Columns\TextColumn::make('order')
                    ->label('Urutan')
                    ->numeric()
                    ->formatStateUsing(function ($state, $record, $column, $rowLoop) {
                        return $rowLoop->iteration; // ini akan mulai dari 1
                    })
                    ->sortable(),
                Tables\Columns\ToggleColumn::make('is_active')
                    ->label('Status'),
                Tables\Columns\ImageColumn::make('foto_struktur')
                    ->label('gambar')
                    ->openUrlInNewTab(),
                Tables\Columns\TextColumn::make('description')
                    ->label('Deskripsi')
                    ->limit(50)
                    ->sortable(),
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
            'index' => Pages\ListFotoStrukturs::route('/'),
            'create' => Pages\CreateFotoStruktur::route('/create'),
            'edit' => Pages\EditFotoStruktur::route('/{record}/edit'),
        ];
    }
}
