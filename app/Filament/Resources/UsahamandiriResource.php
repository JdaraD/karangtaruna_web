<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UsahamandiriResource\Pages;
use App\Filament\Resources\UsahamandiriResource\RelationManagers;
use App\Models\Usahamandiri;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UsahamandiriResource extends Resource
{
    protected static ?string $model = Usahamandiri::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getPluralModelLabel(): string
    {
        return 'Usaha Mandiri';
    }

    public static function getModelLabel(): string
    {
        return 'Usaha Mandiri';
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
                    Forms\Components\TextInput::make('nama_barang')
                        ->label('Nama Barang')
                        ->placeholder('Masukan Nama Barang')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\Select::make('kategori')
                        ->label('Kategori')
                        ->searchable()
                        ->options([
                            'Pilih Kategori' => [
                                'Dekorasi Rumah' => 'Dekorasi Rumah',
                                'Aksesoris' => 'Aksesoris',
                                'Pertanian' => 'Pertanian',
                            ],
                        ]),
                    Forms\Components\TextInput::make('harga')
                        ->label('Harga')
                        ->placeholder('Masukan Harga Barang')
                        ->numeric()
                        ->default(null),
                    Forms\Components\TextInput::make('deskripsi')
                        ->label('Deskripsi')
                        ->placeholder('Masukan Deskripsi Barang')
                        ->maxLength(255)
                        ->default(null),
                    FileUpload::make('foto_barang')
                        ->label('Foto Barang')
                        ->multiple()
                        ->directory('usahamandiri')
                        ->required()
                        ->placeholder('Upload Foto Barang')
                        ->reorderable()
                        ->preserveFilenames()
                        ->maxFiles(10)
                        ->visibility('public')
                        ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/jpg']) // hanya file tipe ini
                        ->rules(['mimes:jpg,jpeg,png']),
                    Forms\Components\TextInput::make('link_tiktok')
                        ->label('Link TikTok')
                        ->placeholder('Masukan Link TikTok')
                        ->maxLength(255)
                        ->default(null),
                    Forms\Components\TextInput::make('link_shopee')
                        ->label('Link Shopee')
                        ->placeholder('Masukan Link Shopee')
                        ->maxLength(255)
                        ->default(null),
                    Forms\Components\TextInput::make('link_lazada')
                        ->label('Link Lazada')
                        ->placeholder('Masukan Link Lazada')
                        ->maxLength(255)
                        ->default(null),
                    Forms\Components\TextInput::make('link_tokopedia')
                        ->label('Link Tokopedia')
                        ->placeholder('Masukan Link Tokopedia')
                        ->maxLength(255)
                        ->default(null),
                ]),
                
            ]);
        
    }
    
public static function beforeCreate(Form $form, array $data): array
{
    // Pastikan nilai yang disimpan ke DB adalah array, bukan string
    $data['foto_barang'] = array_values($data['foto_barang'] ?? []);
    return $data;
}

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('order')
                    ->numeric()
                    ->sortable()
                    ->hidden(),
                Tables\Columns\ToggleColumn::make('is_active')
                    ->label('Status')
                    ->sortable(),
                Tables\Columns\TextColumn::make('nama_barang')
                    ->label('Nama Barang')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('kategori')
                    ->label('Kategori')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('harga')
                    ->label('Harga')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('deskripsi')
                    ->label('Deskripsi')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\ViewColumn::make('foto_barang')
                    ->label('Foto Barang')
                    ->view('tables.columns.multi-image'),
                Tables\Columns\TextColumn::make('link_tiktok')
                    ->label('Link TikTok')
                    ->searchable(),
                Tables\Columns\TextColumn::make('link_shopee')
                    ->label('Link Shopee')
                    ->searchable(),
                Tables\Columns\TextColumn::make('link_lazada')
                    ->label('Link Lazada')
                    ->searchable(),
                Tables\Columns\TextColumn::make('link_tokopedia')
                    ->label('Link Tokopedia')
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
            'index' => Pages\ListUsahamandiris::route('/'),
            'create' => Pages\CreateUsahamandiri::route('/create'),
            'edit' => Pages\EditUsahamandiri::route('/{record}/edit'),
        ];
    }
}
