<?php

namespace App\Filament\Admin\Resources\Modules\Pages;

use App\Filament\Admin\Resources\Modules\ModuleResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditModule extends EditRecord
{
    protected static string $resource = ModuleResource::class;

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
        return 'Editar módulo';
    }

    public function getHeading(): string
    {
        return 'Editar módulo';
    }
}
