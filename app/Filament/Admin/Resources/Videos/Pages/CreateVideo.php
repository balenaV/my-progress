<?php

namespace App\Filament\Admin\Resources\Videos\Pages;

use App\Filament\Admin\Resources\Videos\VideoResource;
use Filament\Resources\Pages\CreateRecord;

class CreateVideo extends CreateRecord
{
    protected static string $resource = VideoResource::class;

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }

    public function getTitle(): string
    {
        return 'Criar vídeo';
    }

    public function getHeading(): string
    {
        return 'Criar novo vídeo';
    }
}
