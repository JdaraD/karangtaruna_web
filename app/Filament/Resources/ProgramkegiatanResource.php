<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProgramkegiatanResource\Pages;
use App\Filament\Resources\ProgramkegiatanResource\RelationManagers;
use App\Models\addmenukegiatan;
use App\Models\Programkegiatan;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProgramkegiatanResource extends Resource
{
    protected static ?string $model = Programkegiatan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    public static function getPluralModelLabel(): string
    {
        return 'Program Kegiatan';
    }
    public static function getModelLabel(): string
    {
        return 'Program Kegiatan';
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
                        Forms\Components\Select::make('program_id')
                            ->label('Program')
                            ->placeholder('Pilih Program')
                            ->relationship('AddmenuProgram', 'nama_program')
                            ->required(),
                        Forms\Components\FileUpload::make('gambar')
                            ->label('Gambar')
                            ->placeholder('Masukan Gambar ( width = 164px height = 143px )')
                            ->image()
                            ->imageEditor()
                            ->imageEditorViewportHeight(164)
                            ->imageEditorViewportWidth(143)
                            ->required(),
                        Forms\Components\Textarea::make('deskripsi')
                            ->label('Deskripsi')
                            ->placeholder('Masukan Deskripsi')
                            ->rows(5)
                            ->required(),
                        Forms\Components\Select::make('progres')
                            ->label('Progress')
                            ->placeholder('Pilih Angka Progress')
                            ->options([
                                '0' => '0%',
                                '25' => '25%',
                                '50' => '50%',
                                '75' => '75%',
                                '100' => '100%',
                            ])
                            ->required(),
                    ]),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('order')
                    ->numeric()
                    ->formatStateUsing(function ($state, $record, $column, $rowLoop) {
                        return $rowLoop->iteration; // ini akan mulai dari 1
                    })
                    ->sortable(),
                Tables\Columns\ToggleColumn::make('is_active')
                    ->label('Status'),
                Tables\Columns\TextColumn::make('addmenuProgram.nama_program')
                    ->label('Program')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('gambar')
                    ->label('Gambar')
                    ->searchable(),
                Tables\Columns\TextColumn::make('deskripsi')
                    ->label('deskripsi')
                    ->limit(5)
                    ->searchable(),
                Tables\Columns\TextColumn::make('progres')
                    ->label('Progress')
                    ->formatStateUsing(fn ($state) => $state . '%')
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
            'index' => Pages\ListProgramkegiatans::route('/'),
            'create' => Pages\CreateProgramkegiatan::route('/create'),
            'edit' => Pages\EditProgramkegiatan::route('/{record}/edit'),
        ];
    }
}
