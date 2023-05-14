<?php

namespace App\Enums;

enum ParkStoryCommentAvailableFlag: int
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
            self::YES => 'あり',
            self::NO => 'なし',
        };
    }
}
