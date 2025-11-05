<?php

namespace App\Filament\Resources\Penjualans\Tables;

use Filament\Actions\Action;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\ViewAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;

class PenjualansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kode')
                    ->label('Kode Penjualan')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('tanggal')
                    ->label('Tanggal')
                    ->date('d M Y')
                    ->sortable(),

                TextColumn::make('jumlah')
                    ->label('Jumlah')
                    ->numeric()
                    ->sortable(),

                TextColumn::make('customer.nama_customer')
                    ->label('Customer')
                    ->searchable(),

                TextColumn::make('faktur.kode_faktur')
                    ->label('Faktur')
                    ->searchable(),

                TextColumn::make('status')
                    ->label('Status')
                    ->formatStateUsing(fn ($state) => $state ? 'Selesai' : 'Pending')
                    ->color(fn ($state) => $state ? 'success' : 'warning'),

                TextColumn::make('keterangan')
                    ->label('Keterangan')
                    ->limit(30),

                TextColumn::make('created_at')
                    ->label('Dibuat Pada')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->emptyStateActions([
            Action::make('create')
                ->label('Buat Faktur')
                ->url(route('filament.admin.resources.fakturs.create'))
                ->icon('heroicon-m-plus')
                ->button(),
        ])
            ->emptyStateIcon('heroicon-o-bookmark')
            ->emptyStateHeading('Tidak ada Data Laporan ')
            ->emptyStateDescription('Silahkan tambahkan data laporan terlebih dahulu')
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
