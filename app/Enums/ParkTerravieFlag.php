<?php

namespace App\Enums;

enum ParkTerravieFlag: int
{
    use EnumTrait;

    case OTHER = 0;

    case TERRAVIE = 1;
}
