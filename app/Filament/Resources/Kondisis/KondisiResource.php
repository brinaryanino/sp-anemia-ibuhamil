<?php

namespace App\Filament\Resources\Kondisis;

use App\Filament\Resources\Kondisis\Pages\CreateKondisi;
use App\Filament\Resources\Kondisis\Pages\EditKondisi;
use App\Filament\Resources\Kondisis\Pages\ListKondisis;
use App\Filament\Resources\Kondisis\Schemas\KondisiForm;
use App\Filament\Resources\Kondisis\Tables\KondisisTable;
use App\Models\Kondisi;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class KondisiResource extends Resource
{
    protected static ?string $model = Kondisi::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedHeart;

    protected static ?string $recordTitleAttribute = 'Kondisi';

    public static function form(Schema $schema): Schema
    {
        return KondisiForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return KondisisTable::configure($table);
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
            'index' => ListKondisis::route('/'),
            'create' => CreateKondisi::route('/create'),
            'edit' => EditKondisi::route('/{record}/edit'),
        ];
    }
}
