<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FoodsResource\Pages;
use App\Filament\Resources\FoodsResource\RelationManagers;
use App\Models\Foods;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FoodsResource extends Resource
{
    protected static ?string $model = Foods::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-storefront';

    protected static ?string $navigationGroup = 'Wisata';

    protected static ?string $modelLabel = "Makanan";

    public static function form(Form $form): Form
    {
        return $form
            ->columns(1)
            ->schema([
                TextInput::make('name')
                    ->label('Nama')
                    ->required(),
                RichEditor::make('description')
                    ->label('Deskripsi')
                    ->required(),
                FileUpload::make('image')
                    ->label('Gambar')
                    ->image()
                    ->required(),
                Select::make('stars')
                    ->label('Bintang')
                    ->options([
                        1 => '1',
                        2 => '2',
                        3 => '3',
                        4 => '4',
                        5 => '5',
                    ])
                    ->required(),
                Select::make('is_published')
                    ->label('Dipublikasikan')
                    ->options([
                        0 => 'Tidak',
                        1 => 'Ya',
                    ])
                    ->default(1)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('Gambar'),
                TextColumn::make('name')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('is_published')
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
            'index' => Pages\ListFoods::route('/'),
            'create' => Pages\CreateFoods::route('/create'),
            'edit' => Pages\EditFoods::route('/{record}/edit'),
        ];
    }
}
