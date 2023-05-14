<?php

namespace App\Enums;

enum ParkTwoFactorAuth: int
{
    use EnumTrait;

    case YES = 1;

    case NO = 0;

    /**
     * @return string
     */
    public function label(): string
    {
        return match ($this) {
            self::YES => '有効',
            self::NO => '無効',
        };
    }
}
