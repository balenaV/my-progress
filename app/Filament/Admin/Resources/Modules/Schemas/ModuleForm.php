<?php

namespace App\Filament\Admin\Resources\Modules\Schemas;

use Filament\Forms\Components\MultiSelect;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ModuleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('course_id')
                    ->label('Curso')
                    ->relationship('course', 'title')
                    ->searchable()
                    ->preload()
                    ->required(),

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
                    ->helperText('Identificador único do módulo dentro do curso.'),

                Textarea::make('description')
                    ->label('Descrição')
                    ->rows(4)
                    ->columnSpanFull(),

                Select::make('status')
                    ->label('Status')
                    ->options([
                        'draft' => 'Rascunho',
                        'published' => 'Publicado',
                        'archived' => 'Arquivado',
                    ])
                    ->default('draft')
                    ->required(),

                TextInput::make('sort_order')
                    ->label('Ordem')
                    ->numeric()
                    ->default(0)
                    ->required()
                    ->helperText('Define a ordem do módulo dentro do curso.'),

                MultiSelect::make('videos')
                    ->label('Vídeos do módulo')
                    ->relationship('videos', 'title')
                    ->searchable()
                    ->preload()
                    ->columnSpanFull(),
            ]);
    }
}
