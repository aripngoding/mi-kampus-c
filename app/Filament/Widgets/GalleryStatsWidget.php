<?php

namespace App\Filament\Widgets;

use App\Models\Gallery;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class GalleryStatsWidget extends BaseWidget
{
    protected static ?int $sort = 2;

    protected function getStats(): array
    {
        return [
            Stat::make('Total Foto Galeri', Gallery::count())
                ->description('Semua foto kegiatan')
                ->descriptionIcon('heroicon-m-photo')
                ->color('success')
                ->icon('heroicon-o-photo'),

            Stat::make('Foto Aktif', Gallery::where('is_active', true)->count())
                ->description('Ditampilkan di website')
                ->descriptionIcon('heroicon-m-eye')
                ->color('info')
                ->icon('heroicon-o-eye'),

            Stat::make('Foto Non-aktif', Gallery::where('is_active', false)->count())
                ->description('Disembunyikan')
                ->descriptionIcon('heroicon-m-eye-slash')
                ->color('warning')
                ->icon('heroicon-o-eye-slash'),
        ];
    }
}
