<?php

namespace App\Filament\Widgets;

use App\Models\Anggota;
use App\Models\Sertifikat;
use App\Models\User;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class AATest extends BaseWidget
{
    protected function getStats(): array
    {
        return [
 
            Stat::make('User', User::count())
                ->description('All user account')
                ->descriptionIcon('heroicon-m-user', IconPosition::Before)
                ->color('success'),

            Stat::make('Anggota', Anggota::where('status', 'anggota')->count())
                ->description('Jumlah anggota')
                ->descriptionIcon('heroicon-m-user-group', IconPosition::Before)
                ->color('info'),

            Stat::make('Pengurus', Anggota::where('status', 'pengurus')->count())
                ->description('Jumlah pengurus')
                ->descriptionIcon('heroicon-m-users', IconPosition::Before)
                ->color('warning'),

            Stat::make('Sertifikat', Sertifikat::count())
                ->description('Sertifikat diterbitkan')
                ->descriptionIcon('heroicon-o-credit-card', IconPosition::Before)
                ->color('danger'),
        ];
    }
}
