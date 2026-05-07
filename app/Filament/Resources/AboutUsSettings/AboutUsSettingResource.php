<?php

namespace App\Filament\Resources\AboutUsSettings; // <-- Updated to match your folder!

// <-- Updated to match your folder!
use App\Models\AboutUsSetting;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;

class AboutUsSettingResource extends Resource
{
    protected static ?string $model = AboutUsSetting::class;

    protected static \BackedEnum|string|null $navigationIcon = 'heroicon-o-information-circle';

    protected static ?string $navigationLabel = 'About Us Settings';

    protected static ?string $pluralModelLabel = 'About Us Settings';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Hero Section')
                    ->schema([
                        Forms\Components\TextInput::make('hero_title')->label('Hero Headline'),
                        Forms\Components\FileUpload::make('hero_image')
                            ->label('Hero Background Image')
                            ->disk('public')
                            ->directory('about-images')
                            ->image(),
                    ])
                    ->collapsible()
                    ->collapsed(),

                Section::make('Who We Are Section')
                    ->schema([
                        Forms\Components\Textarea::make('who_we_are')
                            ->label('Who We Are Text')
                            ->rows(5)
                            ->columnSpanFull(),
                    ]),

                Section::make('Mission & Vision')
                    ->schema([
                        Forms\Components\TextInput::make('mission_title')->label('Mission Title'),
                        Forms\Components\Textarea::make('mission_description')->label('Mission Statement')->rows(3),

                        Forms\Components\TextInput::make('vision_title')->label('Vision Title'),
                        Forms\Components\Textarea::make('vision_description')->label('Vision Statement')->rows(3),
                    ])
                    ->collapsible()
                    ->collapsed(),

                Section::make('Our Story')
                    ->schema([
                        Forms\Components\TextInput::make('story_title')->label('Story Title'),
                        Forms\Components\Textarea::make('story_content')->label('Main Story Content')->rows(6),
                        Forms\Components\FileUpload::make('story_image')
                            ->label('Story Side Image')
                            ->disk('public')
                            ->directory('about-images')
                            ->image(),
                    ])
                    ->collapsible()
                    ->collapsed(),

            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('hero_image')->label('Hero Image')->disk('public'),
                Tables\Columns\TextColumn::make('hero_title')->label('Hero Title'),
                Tables\Columns\TextColumn::make('updated_at')->dateTime()->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                // Empty to prevent 500 error! Click the row to edit.
            ])
            ->bulkActions([
                //
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
            'index' => Pages\ListAboutUsSettings::route('/'),
            'create' => Pages\CreateAboutUsSetting::route('/create'),
            'edit' => Pages\EditAboutUsSetting::route('/{record}/edit'),
        ];
    }
}
