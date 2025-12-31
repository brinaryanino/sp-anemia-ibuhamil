<?php

namespace App\Filament\Resources\SaranAwals;

use App\Filament\Resources\SaranAwals\Pages\CreateSaranAwal;
use App\Filament\Resources\SaranAwals\Pages\EditSaranAwal;
use App\Filament\Resources\SaranAwals\Pages\ListSaranAwals;
use App\Filament\Resources\SaranAwals\Schemas\SaranAwalForm;
use App\Filament\Resources\SaranAwals\Tables\SaranAwalsTable;
use App\Models\SaranAwal;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SaranAwalResource extends Resource
{
    protected static ?string $model = SaranAwal::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedLightBulb;

    protected static ?string $recordTitleAttribute = 'Saran Awal';
    protected static ?string $navigationLabel = 'Saran Awal';

    public static function form(Schema $schema): Schema
    {
        return SaranAwalForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SaranAwalsTable::configure($table);
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
            'index' => ListSaranAwals::route('/'),
            'create' => CreateSaranAwal::route('/create'),
            'edit' => EditSaranAwal::route('/{record}/edit'),
        ];
    }
}
