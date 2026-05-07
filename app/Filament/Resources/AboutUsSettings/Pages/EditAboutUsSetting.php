<?php

namespace App\Filament\Resources\AboutUsSettings\Pages;

use App\Filament\Resources\AboutUsSettings\AboutUsSettingResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditAboutUsSetting extends EditRecord
{
    protected static string $resource = AboutUsSettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
