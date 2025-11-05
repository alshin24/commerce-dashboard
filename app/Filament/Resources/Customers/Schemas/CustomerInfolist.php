<?php

namespace App\Filament\Resources\Customers\Schemas;

use Filament\Schemas\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class CustomerInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Customer')
                    ->schema([
                        TextEntry::make('nama_customer')
                            ->label('Nama Customer'),

                        TextEntry::make('kode_customer')
                            ->label('Kode'),

                        TextEntry::make('alamat_customer')
                            ->label('Alamat'),

                        TextEntry::make('no_telp_customer')
                            ->label('No. Telepon'),
                    ]),
            ]);
    }
}
