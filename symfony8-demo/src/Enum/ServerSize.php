<?php

declare(strict_types=1);

namespace App\Enum;

enum ServerSize: int
{
    case S = 1;
    case M = 2;
    case L = 3;
    case XL = 4;
}
