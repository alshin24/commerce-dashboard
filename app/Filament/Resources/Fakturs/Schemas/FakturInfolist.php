<?php

namespace App\Filament\Resources\Fakturs\Schemas;

use Filament\Schemas\Schema;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;

class FakturInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Faktur')
                    ->schema([
                        TextEntry::make('kode_faktur')
                            ->label('Kode Faktur'),

                        TextEntry::make('tanggal_faktur')
                            ->label('Tanggal Faktur')
                            ->date(),

                        TextEntry::make('kode_customer')
                            ->label('Kode Customer'),

                        TextEntry::make('customer.nama_customer')
                            ->label('Nama Customer'),

                        TextEntry::make('ket_faktur')
                            ->label('Keterangan')
                            ->default('-'),

                        TextEntry::make('total')
                            ->label('Total')
                            ->money('idr', true),

                        TextEntry::make('nominal_charge')
                            ->label('Nominal Charge')
                            ->money('idr', true),

                        TextEntry::make('charge')
                            ->label('Charge (%)'),

                        TextEntry::make('total_final')
                            ->label('Total Final')
                            ->money('idr', true),
                    ]),
            ]);
    }
}
