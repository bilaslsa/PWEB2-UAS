<?php

namespace App\Filament\Widgets;

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
        return [
            Stat::make('Keuntungan', number_format($keuntungan, 0, ',', '.')),
            Stat::make('Jumlah unit', $kendaraan),
            Stat::make('Average time on page', '3:12'),
        ];
    }
}
