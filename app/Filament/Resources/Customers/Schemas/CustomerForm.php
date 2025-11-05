<?php

namespace App\Filament\Resources\Customers\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CustomerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_customer')
                    ->label('nama customer')
                    ->required()
                    ->placeholder('Masukkan nama customer'),
                TextInput::make('kode_customer')
                    ->label('kode customer')
                    ->required()
                    ->placeholder('Masukkan kode customer'),
                TextInput::make('alamat_customer')
                    ->label('alamat customer')
                    ->required()
                    ->placeholder('Masukkan alamat customer'),
                TextInput::make('telepon_customer')
                    ->label('telepon customer')
                    ->required()
                    ->placeholder('Masukkan telepon customer'),

            ]);
    }
}
