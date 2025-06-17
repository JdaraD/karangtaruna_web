<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MenukolaborasiResource\Pages;
use App\Filament\Resources\MenukolaborasiResource\RelationManagers;
use App\Models\Menukolaborasi;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class MenukolaborasiResource extends Resource
{
    protected static ?string $model = Menukolaborasi::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    public static function getPluralModelLabel(): string
    {
        return 'Menu Kolaborasi';
    }
    public static function getModelLabel(): string
    {
        return 'Menu Kolaborasi';
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
                    Forms\Components\TextInput::make('nama_kolaborasi')
                        ->label('Nama Kolaborasi')
                        ->placeholder('Masukan Nama Kolaborasi')
                        ->required()
                        ->beforeStateDehydrated(function ($state) {
                            return Str::title($state); // Kapitalisasi tiap kata, misalnya "halo dunia" → "Halo Dunia"
                        })
                        ->maxLength(255),
                    Forms\Components\FileUpload::make('gambar')
                        ->label('Gambar')
                        ->placeholder('Masukan Gambar ( Height = 150px width = 320px)')
                        ->image()
                        ->imageEditor()
                        ->imageEditorViewportHeight(150)
                        ->imageEditorViewportWidth(320)
                        ->required()
                        ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/jpg']) // hanya file tipe ini
                        ->rules(['mimes:jpg,jpeg,png']),
                    Forms\Components\Textarea::make('deskripsi')
                        ->label('Deskripsi')
                        ->placeholder('Masukan Deskripsi')
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
                    ->numeric()
                    ->sortable()
                    ->formatStateUsing(function ($state, $record, $column, $rowLoop) {
                        return $rowLoop->iteration; // ini akan mulai dari 1
                    }),
                Tables\Columns\ToggleColumn::make('is_active')
                    ->label('Status'),
                Tables\Columns\TextColumn::make('nama_kolaborasi')
                    ->label('Nama Kolaborasi')
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
            'index' => Pages\ListMenukolaborasis::route('/'),
            'create' => Pages\CreateMenukolaborasi::route('/create'),
            'edit' => Pages\EditMenukolaborasi::route('/{record}/edit'),
        ];
    }
}
