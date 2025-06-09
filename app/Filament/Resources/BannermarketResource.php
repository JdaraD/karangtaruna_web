<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BannermarketResource\Pages;
use App\Filament\Resources\BannermarketResource\RelationManagers;
use App\Models\Bannermarket;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BannermarketResource extends Resource
{
    protected static ?string $model = Bannermarket::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    public static function getModelLabel(): string
    {
        return 'Banner Market';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Banner Market';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('order')
                    ->numeric()
                    ->default(0)
                    ->hidden(),
                Section::make()
                    ->schema([
                        Forms\Components\Toggle::make('is_active')
                            ->label('Status')
                            ->required()
                            ->default(true),
                    ]),
                Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('nama_banner')
                            ->label('Nama Banner')
                            ->placeholder('Masukan Nama Banner')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\FileUpload::make('gambar_banner')
                            ->label('Gambar Banner')
                            ->placeholder('Masukan Gambar Banner (Ukuran width 1215px, height 62px)')
                            ->image()
                            ->imageEditor()
                            ->imageEditorViewportWidth('1215')
                            ->imageEditorViewportHeight('62')
                            ->required()
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/jpg']) // hanya file tipe ini
                            ->rules(['mimes:jpg,jpeg,png']),
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
                Tables\Columns\TextColumn::make('nama_banner')
                    ->label('Nama Banner')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('gambar_banner')
                    ->label('Gambar Banner')
                    ->getStateUsing(fn($record)=> asset('storage/'. $record->gambar_banner))
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('deskripsi')
                    ->label('Gambar Banner')
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
            'index' => Pages\ListBannermarkets::route('/'),
            'create' => Pages\CreateBannermarket::route('/create'),
            'edit' => Pages\EditBannermarket::route('/{record}/edit'),
        ];
    }
}
