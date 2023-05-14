<?php

namespace App\Enums;

enum ParkStoryReviewCheckDisplayFlag: int
{
    use EnumTrait;

    case NEED = 1;

    case NOT_NEED = 0;

    /**
     * @return string
     */
    public function label(): string
    {
        return match ($this) {
            self::NEED => '有効',
            self::NOT_NEED => '無効',
        };
    }
}
