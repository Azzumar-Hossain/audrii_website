<?php

namespace App\Filament\Resources\HomepageSettings;

use App\Models\HomepageSetting;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;

class HomepageSettingResource extends Resource
{
    protected static ?string $model = HomepageSetting::class;

    protected static \BackedEnum|string|null $navigationIcon = 'heroicon-o-home';

    protected static ?string $navigationLabel = 'Homepage Settings';

    protected static \UnitEnum|string|null $navigationGroup = 'Homepage Settings';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                // We wrap everything in a Tabs component
                Tabs::make('Homepage Sections')
                    ->tabs([
                        // Tab 1: Hero
                        Tab::make('Hero Section')
                            ->icon('heroicon-o-sparkles')
                            ->schema([
                                // NEW VIDEO URL FIELD (FIXED)
                                Forms\Components\TextInput::make('hero_video')
                                    ->label('Background Video URL (Direct link to an .mp4)')
                                    ->url() // This ensures they type a valid link
                                    ->maxLength(2048)
                                    ->columnSpanFull(),

                                Forms\Components\TextInput::make('hero_badge')
                                    ->label('Hero Badge (Small green text)'),
                                Forms\Components\TextInput::make('hero_title')
                                    ->label('Hero Main Title (Use <em> tags for italic green text)'),
                                Forms\Components\Textarea::make('hero_description')
                                    ->label('Hero Description')
                                    ->rows(3),

                                // REPEATER ADDED HERE
                                Forms\Components\Repeater::make('typewriter_phrases')
                                    ->label('Typewriter Animated Phrases')
                                    ->schema([
                                        Forms\Components\TextInput::make('phrase')
                                            ->label('Text Phrase')
                                            ->required(),
                                    ])
                                    ->addActionLabel('Add a new phrase')
                                    ->columnSpanFull(),
                            ]),

                        // Tab: What We Do
                        Tab::make('What We Do')
                            ->icon('heroicon-o-rectangle-group')
                            ->schema([
                                Forms\Components\TextInput::make('what_we_do_title')
                                    ->label('Section Title')
                                    ->default('WHAT WE DO'),

                                Forms\Components\Textarea::make('what_we_do_description')
                                    ->label('Section Description')
                                    ->rows(2),

                                Forms\Components\Repeater::make('what_we_do_cards')
                                    ->label('Red Action Cards')
                                    ->schema([
                                        Forms\Components\TextInput::make('title')
                                            ->label('Card Title')
                                            ->required(),
                                        Forms\Components\Textarea::make('description')
                                            ->label('Card Description')
                                            ->rows(2)
                                            ->required(),
                                        Forms\Components\TextInput::make('price_text')
                                            ->label('Bottom Text (e.g. <strong>$2.99</strong> /month)'),
                                        Forms\Components\TextInput::make('link')
                                            ->label('Arrow Link URL')
                                            ->url()
                                            ->default('#'),
                                    ])
                                    ->columns(2)
                                    ->addActionLabel('Add a new Card')
                                    ->columnSpanFull(),
                            ]),

                        // Tab 2: Statistics
                        Tab::make('Statistics Bar')
                            ->icon('heroicon-o-chart-bar')
                            ->schema([
                                Fieldset::make('Statistic 1')
                                    ->schema([
                                        Forms\Components\TextInput::make('stat_1_number')->label('Number')->numeric(),
                                        Forms\Components\TextInput::make('stat_1_suffix')->label('Suffix'),
                                        Forms\Components\TextInput::make('stat_1_label')->label('Label'),
                                    ])->columns(3),

                                Fieldset::make('Statistic 2')
                                    ->schema([
                                        Forms\Components\TextInput::make('stat_2_number')->label('Number')->numeric(),
                                        Forms\Components\TextInput::make('stat_2_suffix')->label('Suffix'),
                                        Forms\Components\TextInput::make('stat_2_label')->label('Label'),
                                    ])->columns(3),

                                Fieldset::make('Statistic 3')
                                    ->schema([
                                        Forms\Components\TextInput::make('stat_3_number')->label('Number')->numeric(),
                                        Forms\Components\TextInput::make('stat_3_suffix')->label('Suffix'),
                                        Forms\Components\TextInput::make('stat_3_label')->label('Label'),
                                    ])->columns(3),

                                Fieldset::make('Statistic 4')
                                    ->schema([
                                        Forms\Components\TextInput::make('stat_4_number')->label('Number')->numeric(),
                                        Forms\Components\TextInput::make('stat_4_suffix')->label('Suffix'),
                                        Forms\Components\TextInput::make('stat_4_label')->label('Label'),
                                    ])->columns(3),
                            ]),

                        // Tab 3: Services Header
                        Tab::make('Services Header')
                            ->icon('heroicon-o-briefcase')
                            ->schema([
                                Forms\Components\TextInput::make('services_title')
                                    ->label('Section Title'),
                                Forms\Components\Textarea::make('services_description')
                                    ->label('Section Description')
                                    ->rows(2),
                            ]),

                        // Tab 4: Why Choose Us
                        Tab::make('Why Choose Us')
                            ->icon('heroicon-o-check-badge')
                            ->schema([
                                Forms\Components\TextInput::make('why_us_title')
                                    ->label('Section Title'),
                                Forms\Components\Textarea::make('why_us_description')
                                    ->label('Section Description')
                                    ->rows(2),
                            ]),

                        // Tab 5: Process
                        Tab::make('Process')
                            ->icon('heroicon-o-arrow-path')
                            ->schema([
                                Forms\Components\TextInput::make('process_title')->label('Section Title'),
                                Forms\Components\Textarea::make('process_description')->label('Section Description')->rows(2),

                                Fieldset::make('Step 1')
                                    ->schema([
                                        Forms\Components\TextInput::make('process_1_title')->label('Step 1 Title'),
                                        Forms\Components\TextInput::make('process_1_icon')->label('FontAwesome Icon'),
                                        Forms\Components\Textarea::make('process_1_description')->label('Step 1 Description')->columnSpanFull(),
                                    ])->columns(2),

                                Fieldset::make('Step 2')
                                    ->schema([
                                        Forms\Components\TextInput::make('process_2_title')->label('Step 2 Title'),
                                        Forms\Components\TextInput::make('process_2_icon')->label('FontAwesome Icon'),
                                        Forms\Components\Textarea::make('process_2_description')->label('Step 2 Description')->columnSpanFull(),
                                    ])->columns(2),

                                Fieldset::make('Step 3')
                                    ->schema([
                                        Forms\Components\TextInput::make('process_3_title')->label('Step 3 Title'),
                                        Forms\Components\TextInput::make('process_3_icon')->label('FontAwesome Icon'),
                                        Forms\Components\Textarea::make('process_3_description')->label('Step 3 Description')->columnSpanFull(),
                                    ])->columns(2),

                                Fieldset::make('Step 4')
                                    ->schema([
                                        Forms\Components\TextInput::make('process_4_title')->label('Step 4 Title'),
                                        Forms\Components\TextInput::make('process_4_icon')->label('FontAwesome Icon'),
                                        Forms\Components\Textarea::make('process_4_description')->label('Step 4 Description')->columnSpanFull(),
                                    ])->columns(2),
                            ]),

                        // Tab 6: CTA
                        Tab::make('Call to Action')
                            ->icon('heroicon-o-megaphone')
                            ->schema([
                                Forms\Components\TextInput::make('cta_title')
                                    ->label('CTA Title'),
                                Forms\Components\Textarea::make('cta_description')
                                    ->label('CTA Description')
                                    ->rows(2),
                            ]),

                    ])
                    ->columnSpanFull(), // Makes the tabs stretch nicely across the page
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('hero_title')->label('Hero Title'),
                Tables\Columns\TextColumn::make('updated_at')->dateTime()->label('Last Updated'),
            ])
            ->actions([])
            ->bulkActions([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHomepageSettings::route('/'),
            'create' => Pages\CreateHomepageSetting::route('/create'),
            'edit' => Pages\EditHomepageSetting::route('/{record}/edit'),
        ];
    }
}
