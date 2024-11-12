<?php

namespace App\Filament\Resources\PlantCategoryResource\Pages;

use App\Filament\Resources\PlantCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPlantCategories extends ListRecords
{
    protected static string $resource = PlantCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
