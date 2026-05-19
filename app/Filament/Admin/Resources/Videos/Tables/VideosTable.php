<?php

namespace App\Filament\Admin\Resources\Videos\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class VideosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
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
                    })
                    ->sortable(),

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

                TextColumn::make('processed_at')
                    ->label('Processado em')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Criado em')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'draft' => 'Rascunho',
                        'uploaded' => 'Enviado',
                        'queued' => 'Na fila',
                        'processing' => 'Processando',
                        'processed' => 'Processado',
                        'failed' => 'Falhou',
                        'published' => 'Publicado',
                        'archived' => 'Arquivado',
                    ]),

                TrashedFilter::make(),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
