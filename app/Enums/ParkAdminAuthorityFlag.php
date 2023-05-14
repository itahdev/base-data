<?php

namespace App\Enums;

enum ParkAdminAuthorityFlag: int
{
    use EnumTrait;

    case ADMIN = 0;

    case STAFF = 1;

    /**
     * @return string
     */
    public function label(): string
    {
        return match ($this) {
            self::ADMIN => '管理者',
            self::STAFF => '投稿者',
        };
    }
}
