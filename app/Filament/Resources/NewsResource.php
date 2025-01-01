<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NewsResource\Pages;
use App\Filament\Resources\NewsResource\RelationManagers;
use App\Models\News;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Set;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NewsResource extends Resource
{
    protected static ?string $model = News::class;

    protected static ?string $navigationIcon = 'heroicon-o-rss';

    protected static ?string $navigationGroup = 'Wisata';

    protected static ?string $modelLabel = "Berita";

    public static function form(Form $form): Form
    {
        return $form
            ->columns(1)
            ->schema([
                Forms\Components\Select::make('category')
                    ->label('Kategori')
                    ->searchable()
                    ->required()
                    ->options([
                        'destinasi' => 'Destinasi',
                        'wisata' => 'Wisata',
                        'kuliner' => 'Kuliner',
                        'hotel' => 'Hotel',
                        'event' => 'Event',
                        'tips' => 'Tips',
                        'berita' => 'Berita',
                        'promo' => 'Promo',
                        'umum' => 'Umum',
                        'lainnya' => 'Lainnya',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('title')
                    ->label('Judul')
                    ->live(onBlur:true, debounce:500)
                    ->afterStateUpdated(fn(Set $set, $state) => $set('slug', \Illuminate\Support\Str::slug($state)))
                    ->required(),
                Forms\Components\TextInput::make('slug')
                    ->label('Slug')
                    ->required(),
                Forms\Components\RichEditor::make('content')
                    ->label('Konten')
                    ->required(),
                Forms\Components\FileUpload::make('image')
                    ->label('Gambar')
                    ->image()
                    ->required(),
                Forms\Components\Checkbox::make('is_published')
                    ->label('Dipublikasikan')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Gambar'),
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('is_published')
                    ->label('Dipublikasikan')
                    ->formatStateUsing(fn (string $state) => $state == 1 ? 'Ya' : 'Tidak')
                    ->badge()
                    ->color(fn ($state) => $state == 1 ? 'success' : 'danger')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListNews::route('/'),
            'create' => Pages\CreateNews::route('/create'),
            'edit' => Pages\EditNews::route('/{record}/edit'),
        ];
    }
}
