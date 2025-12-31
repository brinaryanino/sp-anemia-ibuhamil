<?php

namespace App\Filament\Resources\Kondisis\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;

class KondisiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('kode_kondisi')
                    ->label('Kode Kondisi')
                    ->required()
                    ->maxLength(20),
                TextInput::make('nama_kondisi')
                    ->label('Nama Kondisi')
                    ->required()
                    ->maxLength(100),

                Textarea::make('deskripsi')
                    ->label('Deskripsi')
                    ->rows(3)
                    ->columnSpanFull(),
            ]);
    }
}
