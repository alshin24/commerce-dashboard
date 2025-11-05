<?php

namespace App\Filament\Resources\Penjualans\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;

class PenjualanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('kode')
                ->label('Kode Penjualan')
                ->required()
                ->maxLength(255),

            DatePicker::make('tanggal')
                ->label('Tanggal Penjualan')
                ->required(),

            TextInput::make('jumlah')
                ->label('Jumlah')
                ->numeric()
                ->required(),

            Select::make('customer_id')
                ->label('Customer')
                ->relationship('customer', 'nama_customer') // pastikan relasi di model ada
                ->searchable()
                ->preload()
                ->required(),

            Select::make('faktur_id')
                ->label('Faktur')
                ->relationship('faktur', 'kode_faktur') // pastikan relasi di model ada
                ->searchable()
                ->preload()
                ->required(),

            Select::make('status')
                ->label('Status')
                ->options([
                    0 => 'Pending',
                    1 => 'Selesai',
                ])
                ->default(0)
                ->required(),

            Textarea::make('keterangan')
                ->label('Keterangan')
                ->rows(3)
                ->nullable(),
        ]);
    }
}
