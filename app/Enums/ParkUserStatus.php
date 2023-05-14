<?php

namespace App\Enums;

enum ParkUserStatus: int
{
    use EnumTrait;

    case ACTIVE = 0;

    case NOT_ACTIVE = 1;

    /**
     * @return string
     */
    public static function toString(): string
    {
        return implode(',', self ::values());
    }

    /**
     * @return string
     */
    public function label(): string
    {
        return match ($this) {
            self::ACTIVE => '公開',
            self::NOT_ACTIVE => '非公開',
        };
    }
}
