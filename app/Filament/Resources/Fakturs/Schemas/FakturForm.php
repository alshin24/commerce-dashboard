<?php

namespace App\Filament\Resources\Fakturs\Schemas;

use App\Models\barang;
use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use App\Models\CustomerModel;
use Filament\Forms\Components\Repeater;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;

class FakturForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('kode_faktur')
                    ->label('Kode Faktur')
                    ->required()
                    ->maxLength(255),

                DatePicker::make('tanggal_faktur')
                    ->label('Tanggal Faktur')
                    ->required(),

                TextInput::make('kode_customer')
                    ->label('Kode Customer')
                    ->readOnly()
                    ->reactive()
                    ->required(),


                Select::make('customer_id')
                    ->label('Customer')
                    ->reactive()
                    ->relationship('customer', 'nama_customer')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->afterStateHydrated(function ($state, callable $set) {
                        $customer = CustomerModel::find($state);
                        if ($customer) {
                            $set('kode_customer', $customer->kode_customer);
                        }
                    })

                    ->afterStateUpdated(function ($state, callable $set) {
                        $customer = CustomerModel::find($state);

                        if ($customer) {
                            $set('kode_customer', $customer->kode_customer);
                        }
                    }),

                Repeater::make('detail')
                    ->relationship('detail')
                    ->schema([
                        Select::make('barang_id')
                            ->label('Barang')
                            ->relationship('barang', 'nama_barang')
                            ->searchable()
                            ->preload()
                            ->reactive()
                            ->afterStateUpdated(function ($state, callable $set) {
                                $barang = barang::find($state);
                                if ($barang) {
                                    $set('nama_barang', $barang->nama_barang);
                                    $set('harga', $barang->harga_barang);
                                }
                            }),

                        TextInput::make('nama_barang')
                            ->label('Nama Barang')
                            ->readOnly(),

                        TextInput::make('harga')
                            ->label('Harga')
                            ->reactive()
                            ->prefix('Rp')
                            ->numeric()
                            ->readOnly(),

                        TextInput::make('qty')
                            ->afterStateUpdated(function (Set $set, $state, Get $get) {
                                $tampungHarga = $get('harga');
                                $set('hasil_qty', intval($tampungHarga * $state));
                            })
                            ->debounce(500) // buat load tunggu 0.5 detik sebelum user selesai ngetik
                            ->live()
                            ->reactive()
                            ->label('Qty')
                            ->numeric(),

                        TextInput::make('hasil_qty')
                            ->label('Hasil Qty')
                            ->numeric(),

                        TextInput::make('diskon')
                            ->reactive()
                            ->afterStateUpdated(function (Set $set, $state, Get $get) {
                                $hasilQTY = $get('hasil_qty');
                                $diskon = $hasilQTY * ($state / 100);
                                $hasil = $hasilQTY - $diskon;

                                $set('subtotal', intval($hasil));
                            })
                            ->live()
                            ->label('Diskon (%)')
                            ->numeric(),

                        TextInput::make('subtotal')
                            ->label('Subtotal')
                            ->prefix('Rp')
                            ->numeric(),
                    ])
                    ->addActionLabel('Tambah Barang'),


                Textarea::make('ket_faktur')
                    ->label('Keterangan Faktur')
                    ->rows(3)
                    ->nullable(),

                TextInput::make('total')
                    ->afterStateUpdated(function (Set $set, Get $get) {
                        $detail = collect($get('detail'))->pluck('subtotal')->sum() ?? 0;
                        $set('total', intval($detail));

                        $nominalCharge = $get('nominal_charge') ?? 0;
                        $charge = ($detail * $nominalCharge) / 100;
                        $set('charge', $charge);
                        $set('total_final', intval($detail + $charge));
                    })
                    ->reactive()
                    ->live()
                    ->label('Total')
                    ->numeric()
                    ->required(),

                TextInput::make('nominal_charge')
                    ->afterStateUpdated(function (Set $set, $state, Get $get) {
                        $total = $get('total') ?? 0;
                        $charge = ($total * $state) / 100;
                        $set('charge', $charge);
                        $set('total_final', intval($total + $charge));
                    })
                    ->label('Nominal Charge (%)')
                    ->reactive()
                    ->numeric()
                    ->required(),

                TextInput::make('charge')
                    ->label('Charge (Rp)')
                    ->reactive()
                    ->numeric()
                    ->readOnly(),

                TextInput::make('total_final')
                    ->label('Total Final')
                    ->reactive()
                    ->numeric()
                    ->readOnly(),
            ]);
    }
}
