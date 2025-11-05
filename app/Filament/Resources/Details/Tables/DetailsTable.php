<?php

namespace App\Filament\Resources\Details\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class DetailsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('barang.nama_barang')
                    ->label('Nama Barang (Relasi)')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('faktur.kode_faktur')
                    ->label('Kode Faktur')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('nama_barang')
                    ->label('Nama Barang Manual')
                    ->searchable(),

                TextColumn::make('harga')
                    ->label('Harga Satuan')
                    ->money('idr', true)
                    ->sortable(),

                TextColumn::make('qty')
                    ->label('Qty')
                    ->numeric()
                    ->sortable(),

                TextColumn::make('hasil_qty')
                    ->label('Hasil Qty')
                    ->numeric()
                    ->sortable(),

                TextColumn::make('diskon')
                    ->label('Diskon (%)')
                    ->suffix('%')
                    ->numeric()
                    ->sortable(),

                TextColumn::make('subtotal')
                    ->label('Subtotal')
                    ->money('idr', true)
                    ->sortable(),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }
}
