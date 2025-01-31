<?php

namespace App\Filament\Resources\BidangMataLombaResource\Pages;

use App\Filament\Resources\BidangMataLombaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBidangMataLomba extends EditRecord
{
    protected static string $resource = BidangMataLombaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
