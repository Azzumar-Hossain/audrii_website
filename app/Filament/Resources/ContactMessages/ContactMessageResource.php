<?php

namespace App\Filament\Resources\ContactMessages;

use App\Filament\Resources\ContactMessages\Pages;
use App\Models\ContactMessage;

use Filament\Forms;
use Filament\Schemas\Schema; 
use Filament\Schemas\Components\Section; 
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ContactMessageResource extends Resource
{
    protected static ?string $model = ContactMessage::class;

    protected static \BackedEnum|string|null $navigationIcon = 'heroicon-o-envelope';
    protected static ?string $navigationLabel = 'Inbox / Messages';
    protected static ?string $pluralModelLabel = 'Messages';

    // THE BADGE LOGIC (Working perfectly!)
    public static function getNavigationBadge(): ?string
    {
        $count = static::getModel()::where('is_read', false)->count();
        return $count > 0 ? (string) $count : null;
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'danger';
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Message Details')
                    ->schema([
                        // Added a toggle so you can mark it as read inside the message!
                        Forms\Components\Toggle::make('is_read')
                            ->label('Mark as Read')
                            ->columnSpanFull(),

                        Forms\Components\TextInput::make('name')->disabled(),
                        Forms\Components\TextInput::make('email')->disabled(),
                        Forms\Components\TextInput::make('phone')->disabled(),
                        Forms\Components\TextInput::make('company')->disabled(),
                        Forms\Components\TextInput::make('primary_interest')->disabled()->columnSpanFull(),
                        Forms\Components\Textarea::make('message')->rows(6)->disabled()->columnSpanFull(),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // THE FIX: An interactive switch right in the table!
                Tables\Columns\ToggleColumn::make('is_read')
                    ->label('Mark Read'),
                    
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Received')
                    ->dateTime('M d, Y h:i A')
                    ->sortable()
                    ->badge(),
                Tables\Columns\TextColumn::make('name')->label('Client')->searchable()->weight('bold'),
                Tables\Columns\TextColumn::make('primary_interest')->label('Interest')->searchable(),
            ])
            ->defaultSort('created_at', 'desc') 
            ->filters([
                //
            ])
            ->actions([
                // STRIPPED CLEAN to prevent the 500 error!
            ])
            ->bulkActions([
                // STRIPPED CLEAN to prevent the 500 error!
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
            'index' => Pages\ListContactMessages::route('/'),
            // Added the edit route back! Clicking the row safely opens the message.
            'edit' => Pages\EditContactMessage::route('/{record}/edit'),
        ];
    }
}