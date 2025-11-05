<?php

namespace App\Filament\Resources\Barangs\Pages;

use App\Filament\Resources\Barangs\BarangResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;
use Filament\Actions\Action;

class CreateBarang extends CreateRecord
{
    protected static string $resource = BarangResource::class;



    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->title('Data Berhasil Ditambahkan')
            ->icon('heroicon-o-document-text')
            ->iconColor('success')
            ->body('data barang berhasil ditambahkan')
            ->actions([
        Action::make('view')
            ->button(),
        Action::make('undo')
            ->color('gray'),
    ])
            ->send();
    }
}
