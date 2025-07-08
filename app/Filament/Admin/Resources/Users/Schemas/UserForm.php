<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\Users\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

final class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns([
                'default' => 1,
                'xl' => 2,
            ])
            ->components([
                Section::make()
                    ->columnSpan([
                        'default' => 'full',
                        'xl' => 1,
                    ])
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->markAsRequired(false),
                        TextInput::make('email')
                            ->disabled()
                            ->readOnly(),
                    ]),
            ]);
    }
}
