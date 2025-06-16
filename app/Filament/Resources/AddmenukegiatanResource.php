<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AddmenukegiatanResource\Pages;
use App\Filament\Resources\AddmenukegiatanResource\RelationManagers;
use App\Models\Addmenukegiatan;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class AddmenukegiatanResource extends Resource
{
    protected static ?string $model = Addmenukegiatan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    public static function getPluralModelLabel(): string
    {
        return 'Add Menu Kegiatan';
    }
    public static function getModelLabel(): string
    {
        return 'Add Menu Kegiatan';
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
                            ->required()
                            ->label('Status')
                            ->default(true),
                            ]),
                Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('nama_program')
                            ->label('Nama Program')
                            ->placeholder('Masukan Nama Program')
                            ->beforeStateDehydrated(function ($state) {
                                return Str::title($state); // Kapitalisasi tiap kata, misalnya "halo dunia" → "Halo Dunia"
                            })
                            ->required()
                            ->maxLength(255),
                        Forms\Components\FileUpload::make('gambar')
                            ->label('Gambar')
                            ->placeholder('Masukan Gambar Program (height 340px width 600px)')
                            ->image()
                            ->imageEditor()
                            ->imageEditorViewportHeight(340)
                            ->imageEditorViewportWidth(600)
                            ->required(),
                        Forms\Components\Textarea::make('deskripsi')
                            ->label('Deskripsi')
                            ->placeholder('Masukan Deskripsi)')
                            ->rows(5)
                            ->required()
                            ->columnSpanFull(),
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
                Tables\Columns\TextColumn::make('nama_program')
                    ->label('Nama Program')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('gambar')
                    ->label('Gambar')
                    ->searchable(),
                Tables\Columns\TextColumn::make('deskripsi')
                    ->label('Deskripsi')
                    ->limit(5)
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
            'index' => Pages\ListAddmenukegiatans::route('/'),
            'create' => Pages\CreateAddmenukegiatan::route('/create'),
            'edit' => Pages\EditAddmenukegiatan::route('/{record}/edit'),
        ];
    }
}
