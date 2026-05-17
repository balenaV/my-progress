<?php

namespace App\Filament\Admin\Resources\Modules\Pages;

use App\Filament\Admin\Resources\Modules\ModuleResource;
use Filament\Resources\Pages\CreateRecord;

class CreateModule extends CreateRecord
{
    protected static string $resource = ModuleResource::class;

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }

    public function getTitle(): string
    {
        return 'Criar módulo';
    }

    public function getHeading(): string
    {
        return 'Criar novo módulo';
    }
}
