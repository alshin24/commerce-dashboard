<?php

namespace App\Filament\Resources\Details\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;


class DetailForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('barang_id')
                    ->label('Barang')
                    ->relationship('barang', 'nama_barang')
                    ->searchable()
                    ->preload()
                    ->required(),

                Select::make('faktur_id')
                    ->label('Faktur')
                    ->relationship('faktur', 'kode_faktur')
                    ->searchable()
                    ->preload()
                    ->required(),

                Select::make('nama_barang')
                    ->relationship('barang', 'nama_barang')
                    ->searchable()
                    ->label('Nama Barang')
                    ->preload()
                    ->required(),

                TextInput::make('harga')
                    ->label('Harga Satuan')
                    ->numeric()
                    ->required(),

                TextInput::make('qty')
                    ->label('Kuantitas (Qty)')
                    ->numeric()
                    ->required(),

                TextInput::make('hasil_qty')
                    ->label('Total Barang Setelah Proses')
                    ->numeric()
                    ->required(),

                TextInput::make('diskon')
                    ->label('Diskon (%)')
                    ->numeric()
                    ->default(0)
                    ->required(),

                TextInput::make('subtotal')
                    ->label('Subtotal')
                    ->numeric()
                    ->required(),
            ]);
    }
}
