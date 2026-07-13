<?php

namespace App\Filament\Resources\PpdbRegistrationResource\Pages;

use App\Filament\Resources\PpdbRegistrationResource;
use App\Models\PpdbRegistration;
use Filament\Resources\Pages\CreateRecord;

class CreatePpdbRegistration extends CreateRecord
{
    protected static string $resource = PpdbRegistrationResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['registration_number'] = PpdbRegistration::generateRegistrationNumber();
        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
