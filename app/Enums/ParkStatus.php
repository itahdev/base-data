<?php

namespace App\Enums;

enum ParkStatus: int
{
    use EnumTrait;

    case OPEN = 0;

    case CLOSE = 1;

    /**
     * @return string
     */
    public static function toString(): string
    {
        return implode(',', self::values());
    }

    /**
     * @return string
     */
    public function label(): string
    {
        return match ($this) {
            self::OPEN => '公開',
            self::CLOSE => '非公開',
        };
    }
}
