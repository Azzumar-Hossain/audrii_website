<?php

namespace App\Filament\Resources\SiteSettings;

use App\Filament\Resources\SiteSettings\Pages;
use App\Models\SiteSetting;

use Filament\Forms;
use Filament\Schemas\Schema; 
use Filament\Schemas\Components\Section; 
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SiteSettingResource extends Resource
{
    protected static ?string $model = SiteSetting::class;

    protected static \BackedEnum|string|null $navigationIcon = 'heroicon-o-cog-8-tooth';
    protected static ?string $navigationLabel = 'Global Settings';
    protected static \UnitEnum|string|null $navigationGroup = 'Settings';

    // THE FIX: Changed Form $form to Schema $schema
    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Brand Identity')
                    ->schema([
                        Forms\Components\TextInput::make('site_name')
                            ->label('Website Name')
                            ->required()
                            ->columnSpanFull(),
                            
                        Forms\Components\FileUpload::make('site_logo')
                            ->label('Site Logo')
                            ->image()
                            ->directory('site-settings')
                            ->columnSpanFull(),
                    ]),

                Section::make('Contact Information')
                    ->schema([
                        Forms\Components\TextInput::make('contact_email')
                            ->label('Primary Email')
                            ->email(),
                            
                        Forms\Components\TextInput::make('contact_phone')
                            ->label('Primary Phone Number')
                            ->tel(),
                            
                        Forms\Components\Textarea::make('contact_address')
                            ->label('Physical Address')
                            ->rows(3)
                            ->columnSpanFull(),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('site_logo')
                    ->label('Logo'),
                Tables\Columns\TextColumn::make('site_name')
                    ->label('Site Name')
                    ->weight('bold'),
                Tables\Columns\TextColumn::make('contact_email')
                    ->label('Email'),
            ])
            ->actions([
                // Left empty to prevent the Action Class error from earlier!
            ])
            ->bulkActions([
                // Left empty to prevent the Action Class error from earlier!
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSiteSettings::route('/'),
            'create' => Pages\CreateSiteSetting::route('/create'),
            'edit' => Pages\EditSiteSetting::route('/{record}/edit'),
        ];
    }
}