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
                    ->sortable(),

                Tables\Columns\TextColumn::make('trimester')
                    ->label('Trimester')
                    ->sortable(),

                Tables\Columns\TextColumn::make('fokus')
                    ->label('Fokus Saran')
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
