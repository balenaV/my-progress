<?php

namespace App\Filament\Admin\Resources\Modules\RelationManagers;

use App\Filament\Admin\Resources\Videos\VideoResource;
use Filament\Actions\Action;
use Filament\Actions\AttachAction;
use Filament\Actions\DetachAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class VideosRelationManager extends RelationManager
{
    protected static string $relationship = 'videos';

    protected static ?string $relatedResource = VideoResource::class;

    protected static ?string $title = 'Vídeos do módulo';

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('title')
            ->defaultSort('module_video.sort_order')
            ->columns([
                TextColumn::make('title')
                    ->label('Título')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->formatStateUsing(fn(string $state): string => match ($state) {
                        'draft' => 'Rascunho',
                        'uploaded' => 'Enviado',
                        'queued' => 'Na fila',
                        'processing' => 'Processando',
                        'processed' => 'Processado',
                        'failed' => 'Falhou',
                        'published' => 'Publicado',
                        'archived' => 'Arquivado',
                        default => $state,
                    })
                    ->color(fn(string $state): string => match ($state) {
                        'draft' => 'gray',
                        'uploaded' => 'info',
                        'queued' => 'warning',
                        'processing' => 'warning',
                        'processed' => 'success',
                        'published' => 'success',
                        'failed' => 'danger',
                        'archived' => 'gray',
                        default => 'gray',
                    }),

                TextColumn::make('duration_seconds')
                    ->label('Duração')
                    ->formatStateUsing(function (?int $state): string {
                        if (! $state) {
                            return '-';
                        }

                        $hours = intdiv($state, 3600);
                        $minutes = intdiv($state % 3600, 60);
                        $seconds = $state % 60;

                        if ($hours > 0) {
                            return sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);
                        }

                        return sprintf('%02d:%02d', $minutes, $seconds);
                    }),

                TextColumn::make('module_sort_order')
                    ->label('Ordem')
                    ->getStateUsing(fn($record) => $record->pivot?->sort_order ?? '-')
                    ->sortable(query: function ($query, string $direction) {
                        return $query->orderBy('module_video.sort_order', $direction);
                    }),
            ])
            ->headerActions([
                AttachAction::make()
                    ->label('Vincular vídeo')
                    ->recordTitleAttribute('title')
                    ->preloadRecordSelect()
                    ->form(fn(AttachAction $action): array => [
                        $action->getRecordSelect(),

                        TextInput::make('sort_order')
                            ->label('Ordem')
                            ->numeric()
                            ->default(0)
                            ->required(),
                    ]),
            ])
            ->recordActions([
                EditAction::make()
                    ->label('Editar vídeo'),

                Action::make('editarOrdem')
                    ->label('Editar ordem')
                    ->icon('heroicon-o-arrows-up-down')
                    ->form([
                        TextInput::make('sort_order')
                            ->label('Ordem')
                            ->numeric()
                            ->required(),
                    ])
                    ->fillForm(fn($record): array => [
                        'sort_order' => $record->pivot->sort_order,
                    ])
                    ->action(function ($record, array $data): void {
                        $this->ownerRecord
                            ->videos()
                            ->updateExistingPivot($record->id, [
                                'sort_order' => $data['sort_order'],
                            ]);
                    }),

                DetachAction::make()
                    ->label('Desvincular'),
            ]);
    }
}
