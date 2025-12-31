<?php

namespace App\Filament\Resources\BasisPengetahuans\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables;
use Filament\Tables\Table;

class BasisPengetahuansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('gejala.kode_gejala')
                    ->label('Kode Gejala')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('gejala.nama_gejala')
                    ->label('Gejala')
                    ->wrap()
                    ->searchable(),

                Tables\Columns\TextColumn::make('kondisi.nama_kondisi')
                    ->label('Kondisi')
                    ->sortable(),

                Tables\Columns\TextColumn::make('cf_pakar')
                    ->label('CF Pakar')
                    ->numeric(2)
                    ->sortable(),
            ])
            ->filters([
                // filter belum wajib
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
