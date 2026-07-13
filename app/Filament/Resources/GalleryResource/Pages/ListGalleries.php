<?php

namespace App\Filament\Resources\GalleryResource\Pages;

use App\Filament\Resources\GalleryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGalleries extends ListRecords
{
    protected static string $resource = GalleryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('bulkUpload')
                ->label('Upload Masal')
                ->icon('heroicon-o-arrow-up-tray')
                ->color('info')
                ->form([
                    \Filament\Forms\Components\FileUpload::make('images')
                        ->label('Pilih Foto')
                        ->multiple()
                        ->image()
                        ->directory('gallery')
                        ->required(),
                    \Filament\Forms\Components\TextInput::make('base_title')
                        ->label('Judul Dasar')
                        ->placeholder('Contoh: Kegiatan LDKS')
                        ->required(),
                ])
                ->action(function (array $data) {
                    foreach ($data['images'] as $imagePath) {
                        \App\Models\Gallery::create([
                            'title' => $data['base_title'],
                            'image_path' => $imagePath,
                            'is_active' => true,
                        ]);
                    }

                    \Filament\Notifications\Notification::make()
                        ->title('Upload Berhasil')
                        ->body(count($data['images']) . ' foto telah ditambahkan ke galeri.')
                        ->success()
                        ->send();
                }),
            Actions\CreateAction::make()->label('Tambah Foto Satuan'),
        ];
    }
}
