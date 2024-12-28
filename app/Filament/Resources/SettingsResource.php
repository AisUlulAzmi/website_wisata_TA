<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SettingsResource\Pages;
use App\Filament\Resources\SettingsResource\RelationManagers;
use App\Models\Settings;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SettingsResource extends Resource
{
    protected static ?string $model = Settings::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog-8-tooth';

    protected static ?string $navigationGroup = 'Pengaturan';

    protected static ?string $modelLabel = "Pengaturan";

    protected static array $should_text_input = [
        'whyus-1-title',
        'whyus-2-title',
        'whyus-3-title',
        'video-youtube'
    ];

    protected static array $should_textarea = [
        'whyus-1-caption',
        'whyus-2-caption',
        'whyus-3-caption'
    ];

    protected static array $should_image_upload = [
        'banner-image',
        'video-overlay-image'
    ];

    public static function form(Form $form): Form
    {
        return $form
            ->columns(1)
            ->schema([
                TextInput::make('key')
                    ->label('Kunci')
                    ->disabled(),
                
                TextInput::make('value')
                    ->label('Nilai')
                    ->visible(fn($record) => in_array($record->key, static::$should_text_input)),

                Textarea::make('value')
                    ->label('Nilai')
                    ->visible(fn($record) => in_array($record->key, static::$should_textarea)),

                FileUpload::make('value')
                    ->label('Nilai')
                    ->image()
                    ->visible(fn($record) => in_array($record->key, static::$should_image_upload)),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('key')
                    ->label('Kunci'),
                Tables\Columns\TextColumn::make('value')
                    ->limit(50)
                    ->label('Nilai'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListSettings::route('/'),
            'create' => Pages\CreateSettings::route('/create'),
            'edit' => Pages\EditSettings::route('/{record}/edit'),
        ];
    }
}
