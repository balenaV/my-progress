<?php

namespace App\Filament\Admin\Resources\Videos\Pages;

use App\Filament\Admin\Resources\Videos\VideoResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditVideo extends EditRecord
{
    protected static string $resource = VideoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }

    public function getTitle(): string
    {
        return 'Editar vídeo';
    }

    public function getHeading(): string
    {
        return 'Editar vídeo';
    }
}
