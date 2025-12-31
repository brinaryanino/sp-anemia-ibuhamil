<?php

namespace App\Filament\Resources\BasisPengetahuans\Pages;

use App\Filament\Resources\BasisPengetahuans\BasisPengetahuanResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditBasisPengetahuan extends EditRecord
{
    protected static string $resource = BasisPengetahuanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
