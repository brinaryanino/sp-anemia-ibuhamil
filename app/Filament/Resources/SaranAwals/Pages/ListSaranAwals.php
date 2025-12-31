<?php

namespace App\Filament\Resources\SaranAwals\Pages;

use App\Filament\Resources\SaranAwals\SaranAwalResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSaranAwals extends ListRecords
{
    protected static string $resource = SaranAwalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
