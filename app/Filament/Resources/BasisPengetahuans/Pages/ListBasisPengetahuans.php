<?php

namespace App\Filament\Resources\BasisPengetahuans\Pages;

use App\Filament\Resources\BasisPengetahuans\BasisPengetahuanResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListBasisPengetahuans extends ListRecords
{
    protected static string $resource = BasisPengetahuanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
