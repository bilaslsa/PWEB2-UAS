<?php

namespace App\Filament\Widgets;

use App\Models\User;
use App\Models\armada;
use App\Models\peminjaman;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $keuntungan = peminjaman::sum('biaya');
        $kendaraan = armada::count('*');
        $user =  User::count('*');
        return [
            Stat::make('User', $user),
            Stat::make('Jumlah unit', $kendaraan),
            Stat::make('Keuntungan', number_format($keuntungan, 0, ',', '.')),
        ];
    }
}
