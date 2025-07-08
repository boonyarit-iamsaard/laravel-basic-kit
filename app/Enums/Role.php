<?php

declare(strict_types=1);

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum Role: string implements HasColor, HasLabel
{
    case Administrator = 'administrator';
    case User = 'user';

    public function getColor(): string
    {
        return match ($this) {
            self::Administrator => 'danger',
            self::User => 'info',
        };
    }

    public function getLabel(): string
    {
        return match ($this) {
            self::Administrator => 'Administrator',
            self::User => 'User',
        };
    }
}
