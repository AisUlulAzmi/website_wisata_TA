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
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Get;

class SettingsResource extends Resource
{
    protected static ?string $model = Settings::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog-8-tooth';

    protected static ?string $navigationGroup = 'Pengaturan';

    protected static ?string $modelLabel = "Pengaturan";

    public static function form(Form $form): Form
    {
        return $form
            ->columns(1)
            ->schema([
                TextInput::make('key')
                    ->label('Kunci')
                    ->disabled(),

                Grid::make(1)
                    ->schema(function(Get $get):array {
                        $elements = [];

                        switch ($get('key')) {
                            case 'whyus-1-title':
                            case 'whyus-2-title':
                            case 'whyus-3-title':
                            case 'video-youtube':
                            default:
                                $elements = [
                                    TextInput::make('value')
                                        ->label('Judul')
                                ];
                                break;
                            
                            case 'whyus-1-caption':
                            case 'whyus-2-caption':
                            case 'whyus-3-caption':
                                $elements = [
                                    Textarea::make('value')
                                        ->label('Caption')
                                ];
                                break;
                            
                            case 'aboutus-content':
                                $elements = [
                                    RichEditor::make('value')
                                        ->label('Konten')
                                ];
                                break;

                            case 'banner-image':
                            case 'video-overlay-image':
                                $elements = [
                                    FileUpload::make('value')
                                        ->label('Gambar')
                                        ->image()
                                ];
                                break;
                        }

                        return $elements;
                    })
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
