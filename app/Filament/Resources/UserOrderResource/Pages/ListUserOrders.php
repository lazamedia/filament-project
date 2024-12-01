<?php

namespace App\Filament\Resources\UserOrderResource\Pages;

use App\Filament\Resources\UserOrderResource;
use App\Models\OrderList;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListUserOrders extends ListRecords
{
    protected static string $resource = UserOrderResource::class;

    // Menyesuaikan method getTableQuery agar sesuai dengan tanda tangan yang dibutuhkan
    protected function getTableQuery(): ?Builder
    {
        return OrderList::query()->where('user_id', auth()->id()); // Pastikan ini mengembalikan query builder
    }
}
