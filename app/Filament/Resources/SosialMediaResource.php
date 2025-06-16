<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SosialMediaResource\Pages;
use App\Filament\Resources\SosialMediaResource\RelationManagers;
use App\Models\SosialMedia;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SosialMediaResource extends Resource
{
    protected static ?string $model = SosialMedia::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    public static function getPluralModelLabel(): string
    {
        return 'Sosial Media';
    }
    public static function getModelLabel(): string
    {
        return 'Sosial Media';
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
                        Forms\Components\FileUpload::make('logo')
                            ->label('Logo Aplikasi')
                            ->placeholder('Upload Logo')
                            ->image()
                            ->imageEditor()
                            ->imageEditorViewportHeight(36)
                            ->imageEditorViewportWidth(36)
                            ->required()
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/jpg']) // hanya file tipe ini
                            ->rules(['mimes:jpg,jpeg,png']),
                        Forms\Components\TextInput::make('judul')
                            ->label('Nama Aplikasi')
                            ->placeholder('Masukan Nama Aplikasi')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('nama_akun')
                            ->label('Nama Akun Aplikasi')
                            ->placeholder('Masukan Nama Akun Aplikasi')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('link_aplikasi')
                            ->label('Link Aplikasi')
                            ->placeholder('Masukan Link Aplikasi')
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
                Tables\Columns\ImageColumn::make('logo')
                    ->label('Logo Aplikasi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('judul')
                    ->label('Nama Aplikasi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama_akun')
                    ->label('Nama Akun Aplikasi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('link_aplikasi')
                    ->label('Link Aplikasi')
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
            'index' => Pages\ListSosialMedia::route('/'),
            'create' => Pages\CreateSosialMedia::route('/create'),
            'edit' => Pages\EditSosialMedia::route('/{record}/edit'),
        ];
    }
}
