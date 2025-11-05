<?php

namespace App\Filament\Resources\Barangs\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class BarangForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_barang')
                    ->label('Nama Barang')
                    ->required()
                    ->suffixIcon(Heroicon::ShoppingBag)
                    ->placeholder('masukan nama')
                    ->suffixIconColor('success'),
                TextInput::make('kode_barang')
                    ->label('Kode Barang')
                    ->required()
                    ->suffixIcon(Heroicon::CodeBracket)
                    ->suffixIconColor('success')
                    ->placeholder('masukan kode'),
                TextInput::make('harga_barang')
                    ->integer()
                    ->required()
                    ->placeholder('masukan harga')
                    ->label('Harga Barang')
                    ->suffixIcon(Heroicon::ListBullet)
                    ->suffixIconColor('success'),
            ]);
    }
}
