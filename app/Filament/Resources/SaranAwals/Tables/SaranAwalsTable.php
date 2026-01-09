<?php

namespace App\Filament\Resources\SaranAwals\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables;
use Filament\Tables\Table;

class SaranAwalsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kondisi.nama_kondisi')
                    ->label('Kondisi')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('trimester')
                    ->label('Trimester')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('fokus')
                    ->label('Fokus Saran')
                    ->wrap()
                    ->searchable(),

                Tables\Columns\TextColumn::make('deskripsi_saran')
                    ->label('Deskripsi Saran')
                    ->wrap()
                    ->searchable(),
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
