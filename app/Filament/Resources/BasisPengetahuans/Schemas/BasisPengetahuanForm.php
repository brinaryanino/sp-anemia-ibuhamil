<?php

namespace App\Filament\Resources\BasisPengetahuans\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class BasisPengetahuanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('gejala_id')
                    ->label('Gejala')
                    ->relationship(
                        name: 'gejala',
                        titleAttribute: 'nama_gejala'
                    )
                    ->searchable()
                    ->required(),

                Select::make('kondisi_id')
                    ->label('Kondisi')
                    ->relationship(
                        name: 'kondisi',
                        titleAttribute: 'nama_kondisi'
                    )
                    ->required(),

                TextInput::make('cf_pakar')
                    ->label('Certainty Factor (CF)')
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(1)
                    ->step(0.01)
                    ->helperText('Nilai antara 0.00 – 1.00')
                    ->required(),
            ]);
    }
}
