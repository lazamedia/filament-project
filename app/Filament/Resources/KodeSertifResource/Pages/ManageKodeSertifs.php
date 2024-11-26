<?php

namespace App\Filament\Resources\KodeSertifResource\Pages;

use App\Filament\Resources\KodeSertifResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageKodeSertifs extends ManageRecords
{
    protected static string $resource = KodeSertifResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTitle(): string
    {
        return 'Data Kode Sertif';
    }
}
