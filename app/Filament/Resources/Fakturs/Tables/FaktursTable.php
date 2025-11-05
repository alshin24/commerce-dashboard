<?php

namespace App\Filament\Resources\Fakturs\Tables;

use App\Models\FakturModel;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class FaktursTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kode_faktur')
                    ->label('Kode Faktur')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('tanggal_faktur')
                    ->label('Tanggal Faktur')
                    ->date()
                    ->sortable(),

                TextColumn::make('kode_customer')
                    ->label('Kode Customer')
                    ->searchable(),

                TextColumn::make('customer.nama_customer')
                    ->label('Nama Customer')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('ket_faktur')
                    ->label('Keterangan')
                    ->limit(30)
                    ->toggleable(),

                TextColumn::make('total')
                    ->label('Total')
                    ->formatStateUsing(fn ($state) => 'Rp. ' . number_format($state, 0, ',', '.'))

                    ->numeric()
                    ->sortable(),

                TextColumn::make('nominal_charge')
                    ->label('Nominal Charge')
                    ->numeric()
                    ->sortable(),

                TextColumn::make('charge')
                    ->label('Charge (%)')
                    ->numeric()
                    ->sortable(),

                TextColumn::make('total_final')
                    ->label('Total Final')
                    ->numeric()
                    ->sortable(),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
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
