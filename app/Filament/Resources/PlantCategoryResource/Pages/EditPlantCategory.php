<?php

namespace App\Filament\Resources\PlantCategoryResource\Pages;

use App\Filament\Resources\PlantCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPlantCategory extends EditRecord
{
    protected static string $resource = PlantCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
