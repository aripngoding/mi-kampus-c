<?php

namespace App\Filament\Widgets;

use App\Models\Gallery;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestPhotosWidget extends BaseWidget
{
    protected static ?int $sort = 3;
    protected int | string | array $columnSpan = 'full';
    protected static ?string $heading = 'Foto Kegiatan Terbaru';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Gallery::query()->latest()->limit(5)
            )
            ->columns([
                Tables\Columns\ImageColumn::make('image_path')
                    ->label('Foto')
                    ->square(),
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal')
                    ->dateTime('d M Y'),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Status')
                    ->boolean(),
            ])
            ->actions([
                Tables\Actions\Action::make('view')
                    ->label('Lihat Semua')
                    ->url('/admin/galleries')
                    ->icon('heroicon-m-arrow-right'),
            ]);
    }
}
