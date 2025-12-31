<?php

namespace App\Filament\Resources\Kondisis\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables;


class KondisisTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kode_kondisi')
                    ->label('Kode Kondisi')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nama_kondisi')
                    ->label('Nama Kondisi')
                    ->searchable()
                    ->wrap(),
                Tables\Columns\TextColumn::make('deskripsi')
                    ->label('Deskripsi')
                    ->wrap(),
                //
            ])
            ->filters([
                //
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

/*******  f5d3cda2-9d92-4656-a1e1-6159477eeb08  *******/
