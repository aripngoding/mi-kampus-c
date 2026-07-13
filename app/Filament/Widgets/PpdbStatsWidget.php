<?php

namespace App\Filament\Widgets;

use App\Models\PpdbRegistration;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class PpdbStatsWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Pendaftar', PpdbRegistration::count())
                ->description('Semua pendaftar PPDB')
                ->descriptionIcon('heroicon-m-users')
                ->color('primary')
                ->icon('heroicon-o-users'),

            Stat::make('Menunggu Verifikasi', PpdbRegistration::where('status', 'pending')->count())
                ->description('Belum diproses')
                ->descriptionIcon('heroicon-m-clock')
                ->color('warning')
                ->icon('heroicon-o-clock'),

            Stat::make('Terverifikasi', PpdbRegistration::where('status', 'verified')->count())
                ->description('Berkas terverifikasi')
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('info')
                ->icon('heroicon-o-check-circle'),

            Stat::make('Diterima', PpdbRegistration::where('status', 'accepted')->count())
                ->description('Siswa diterima')
                ->descriptionIcon('heroicon-m-check-badge')
                ->color('success')
                ->icon('heroicon-o-check-badge'),

            Stat::make('Ditolak', PpdbRegistration::where('status', 'rejected')->count())
                ->description('Tidak diterima')
                ->descriptionIcon('heroicon-m-x-circle')
                ->color('danger')
                ->icon('heroicon-o-x-circle'),
        ];
    }
}
