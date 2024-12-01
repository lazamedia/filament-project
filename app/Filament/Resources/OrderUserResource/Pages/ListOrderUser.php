<?php

namespace App\Filament\Resources\OrderUserResource\Pages;

use App\Filament\Resources\OrderUserResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOrderUser extends ListRecords
{
    protected static string $resource = OrderUserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
