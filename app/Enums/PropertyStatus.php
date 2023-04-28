<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 */
final class PropertyStatus extends Enum
{
    const ForRent = 1;
    const ForSale = 2;
    const ForInvestment = 3;
    const Featured = 4;
}
