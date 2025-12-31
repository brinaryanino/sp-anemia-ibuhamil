<?php

namespace App\Filament\Resources\SaranAwals\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class SaranAwalForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('kondisi_id')
                    ->label('Kondisi Anemia')
                    ->relationship(
                        name: 'kondisi',
                        titleAttribute: 'nama_kondisi'
                    )
                    ->required(),

                Select::make('trimester')
                    ->label('Trimester Kehamilan')
                    ->options([
                        'I' => 'Trimester I',
                        'II' => 'Trimester II',
                        'III' => 'Trimester III',
                        'Semua' => 'Semua Trimester',
                    ])
                    ->required(),

                TextInput::make('fokus')
                    ->label('Fokus Saran')
                    ->required()
                    ->maxLength(100),

                Textarea::make('deskripsi_saran')
                    ->label('Deskripsi Saran')
                    ->rows(4)
                    ->columnSpanFull()
                    ->required(),
            ]);
    }
}
