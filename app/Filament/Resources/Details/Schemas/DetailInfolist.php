<?php

namespace App\Filament\Resources\Details\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section as ComponentsSection;

class DetailInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Detail Barang')
                    ->schema([
                        TextEntry::make('barang.nama_barang')
                            ->label('Nama Barang (Relasi)')
                            ->default('-'),

                        TextEntry::make('faktur.kode_faktur')
                            ->label('Kode Faktur')
                            ->default('-'),

                        TextEntry::make('nama_barang')
                            ->label('Nama Barang Manual')
                            ->default('-'),

                        TextEntry::make('harga')
                            ->label('Harga Satuan')
                            ->money('idr', true)
                            ->default(0),

                        TextEntry::make('qty')
                            ->label('Qty')
                            ->numeric()
                            ->default(0),

                        TextEntry::make('hasil_qty')
                            ->label('Hasil Qty')
                            ->numeric()
                            ->default(0),

                        TextEntry::make('diskon')
                            ->label('Diskon (%)')
                            ->suffix('%')
                            ->default(0),

                        TextEntry::make('subtotal')
                            ->label('Subtotal')
                            ->money('idr', true)
                            ->default(0),
                    ]),
            ]);
    }
}
