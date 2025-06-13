<?php

namespace App\Filament\Widgets;

use App\Models\peminjaman;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $keuntungan = peminjaman::count('*');
        return [
            Stat::make('Keuntungan', $keuntungan),
            Stat::make('Bounce rate', '21%'),
            Stat::make('Average time on page', '3:12'),
        ];
    }
}
