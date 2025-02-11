<?php

namespace App\Filament\Sekolah\Resources\DaftarLombaResource\Pages;

use App\Filament\Sekolah\Resources\DaftarLombaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDaftarLomba extends EditRecord
{
    protected static string $resource = DaftarLombaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
