<?php

namespace App\Filament\Resources\BasisPengetahuans;

use App\Filament\Resources\BasisPengetahuans\Pages\CreateBasisPengetahuan;
use App\Filament\Resources\BasisPengetahuans\Pages\EditBasisPengetahuan;
use App\Filament\Resources\BasisPengetahuans\Pages\ListBasisPengetahuans;
use App\Filament\Resources\BasisPengetahuans\Schemas\BasisPengetahuanForm;
use App\Filament\Resources\BasisPengetahuans\Tables\BasisPengetahuansTable;
use App\Models\BasisPengetahuan;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class BasisPengetahuanResource extends Resource
{
    protected static ?string $model = BasisPengetahuan::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBookOpen;

    protected static ?string $recordTitleAttribute = 'Basis Pengetahuan';

    public static function form(Schema $schema): Schema
    {
        return BasisPengetahuanForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BasisPengetahuansTable::configure($table);
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
            'index' => ListBasisPengetahuans::route('/'),
            'create' => CreateBasisPengetahuan::route('/create'),
            'edit' => EditBasisPengetahuan::route('/{record}/edit'),
        ];
    }
}
