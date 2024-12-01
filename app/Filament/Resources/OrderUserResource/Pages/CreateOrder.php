<?php

namespace App\Filament\Resources\OrderUserResource\Pages;

use App\Filament\Resources\OrderUserResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateOrder extends CreateRecord
{
    protected static string $resource = OrderUserResource::class;
}
