<?php

namespace App\Filament\Admin\Resources\Videos\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class VideoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Título')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(function ($set, ?string $state) {
                        $set('slug', Str::slug($state));
                    }),

                TextInput::make('slug')
                    ->label('Slug')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true)
                    ->helperText('Identificador único do vídeo.'),

                Textarea::make('description')
                    ->label('Descrição')
                    ->rows(4)
                    ->columnSpanFull(),

                FileUpload::make('original_path')
                    ->label('Arquivo original')
                    ->directory('videos/originals')
                    ->visibility('public')
                    ->acceptedFileTypes([
                        'video/mp4',
                        'video/mpeg',
                        'video/quicktime',
                        'video/x-msvideo',
                        'video/x-matroska',
                    ])
                    ->columnSpanFull()
                    ->helperText('Arquivo original enviado antes do processamento.'),

                FileUpload::make('thumbnail_path')
                    ->label('Thumbnail')
                    ->image()
                    ->directory('videos/thumbnails')
                    ->visibility('public'),

                TextInput::make('hls_path')
                    ->label('Caminho HLS')
                    ->maxLength(255)
                    ->helperText('Será preenchido futuramente após processamento com FFmpeg.'),

                TextInput::make('duration_seconds')
                    ->label('Duração em segundos')
                    ->numeric()
                    ->helperText('Duração total do vídeo em segundos.'),

                Select::make('status')
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
                    ])
                    ->default('draft')
                    ->required(),

                DateTimePicker::make('processed_at')
                    ->label('Processado em')
                    ->seconds(false),

                KeyValue::make('metadata')
                    ->label('Metadados')
                    ->keyLabel('Chave')
                    ->valueLabel('Valor')
                    ->columnSpanFull()
                    ->helperText('Informações técnicas futuras, como codec, resolução, bitrate e tamanho.'),
            ]);
    }
}
