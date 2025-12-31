<?php

namespace App\Filament\Resources\Gejalas\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables;
use Filament\Tables\Table;

class GejalasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kode_gejala')
                    ->label('Kode Gejala')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('nama_gejala')
                    ->label('Nama Gejala')
                    ->searchable()
                    ->wrap(),
            ])
            ->filters([
                // belum diperlukan
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
