<?php

namespace App\Filament\Resources\Features; // <-- Updated to match your folder!

use App\Filament\Resources\Features\Pages; // <-- Updated to match your folder!
use App\Models\Feature;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Schema; 
use Filament\Schemas\Components\Section; 
use Filament\Tables;
use Filament\Tables\Table;

class FeatureResource extends Resource
{
    protected static ?string $model = Feature::class;

    // A nice checkmark shield icon for the menu
    protected static \BackedEnum|string|null $navigationIcon = 'heroicon-o-shield-check';
    
    protected static ?string $navigationLabel = 'Why Choose Us Cards';
    protected static ?string $pluralModelLabel = 'Why Choose Us Cards';
    protected static \UnitEnum|string|null $navigationGroup = 'Homepage Settings';
    
    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\TextInput::make('title')
                    ->required(),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->rows(3),
                Forms\Components\TextInput::make('icon')
                    ->label('FontAwesome Icon Class')
                    ->placeholder('e.g., fa-flag, fa-euro-sign, fa-handshake')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('icon_image')
                    ->label('Icon')
                    ->disk('public'),
                Tables\Columns\TextColumn::make('title')->searchable(),
                Tables\Columns\TextColumn::make('updated_at')->dateTime()->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                // Empty to prevent 500 error
            ])
            ->bulkActions([
                // Empty to prevent 500 error
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
            'index' => Pages\ListFeatures::route('/'),
            'create' => Pages\CreateFeature::route('/create'),
            'edit' => Pages\EditFeature::route('/{record}/edit'),
        ];
    }
}