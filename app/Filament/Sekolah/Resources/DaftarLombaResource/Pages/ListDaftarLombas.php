<?php

namespace App\Filament\Sekolah\Resources\DaftarLombaResource\Pages;

use App\Filament\Sekolah\Resources\DaftarLombaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDaftarLombas extends ListRecords
{
    protected static string $resource = DaftarLombaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
