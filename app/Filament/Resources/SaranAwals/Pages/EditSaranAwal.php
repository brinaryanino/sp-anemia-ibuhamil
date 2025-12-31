<?php

namespace App\Filament\Resources\SaranAwals\Pages;

use App\Filament\Resources\SaranAwals\SaranAwalResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSaranAwal extends EditRecord
{
    protected static string $resource = SaranAwalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
