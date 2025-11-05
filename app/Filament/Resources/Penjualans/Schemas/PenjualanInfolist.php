<?php

namespace App\Filament\Resources\Penjualans\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Infolists\Components\TextEntry;

class PenjualanInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Data Penjualan')
                ->columns(2)
                ->schema([
                    TextEntry::make('kode')
                        ->label('Kode Penjualan'),

                    TextEntry::make('tanggal')
                        ->label('Tanggal Penjualan'),

                    TextEntry::make('jumlah')
                        ->label('Jumlah')
                        ->formatStateUsing(fn ($state) => 'Rp ' . number_format($state, 0, ',', '.')),

                    TextEntry::make('status')
                        ->label('Status')
                        ->badge()
                        ->color(fn ($state) => match ($state) {
                            1 => 'success',
                            0 => 'warning',
                            default => 'gray',
                        })
                        ->formatStateUsing(fn ($state) => $state ? 'Selesai' : 'Pending'),
                ]),

            Section::make('Relasi & Catatan')
                ->columns(2)
                ->schema([
                    TextEntry::make('customer.nama_customer')
                        ->label('Nama Customer'),

                    TextEntry::make('faktur.kode_faktur')
                        ->label('Kode Faktur'),

                    TextEntry::make('keterangan')
                        ->label('Keterangan')
                        ->default('-'),
                ]),
        ]);
    }
}
