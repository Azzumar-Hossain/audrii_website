<?php

namespace App\Filament\Resources\HomepageSettings\Pages;

use App\Filament\Resources\HomepageSettings\HomepageSettingResource;
use App\Models\HomepageSetting;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHomepageSettings extends ListRecords
{
    protected static string $resource = HomepageSettingResource::class;

    public function mount(): void
    {
        parent::mount();

        // Fetch the very first row in the database
        $setting = HomepageSetting::first();

        // If it exists, redirect instantly to the Edit page
        if ($setting) {
            redirect(HomepageSettingResource::getUrl('edit', ['record' => $setting->id]));
        } 
        // If it doesn't exist yet, redirect to the Create page
        else {
            redirect(HomepageSettingResource::getUrl('create'));
        }
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}