<?php

namespace App\Filament\Resources\Barangs\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;


class BarangInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
               Section::make('Informasi Barang')
                    ->schema([
                        TextEntry::make('nama_barang')
                            ->label('Nama Barang'),

                        TextEntry::make('kode_barang')
                            ->label('Kode'),

                        TextEntry::make('harga_barang')
                            ->label('harga'),
                    ]),
            ]);
    }
}
