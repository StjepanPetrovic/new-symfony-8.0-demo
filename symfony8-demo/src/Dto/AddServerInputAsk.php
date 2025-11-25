<?php

declare(strict_types=1);

namespace App\Dto;

use App\Enum\CloudRegion;
use App\Enum\ServerSize;
use Symfony\Component\Console\Attribute\Argument;
use Symfony\Component\Console\Attribute\Ask;
use Symfony\Component\Console\Attribute\Option;

final class AddServerInputAsk
{
    #[Argument]
    #[Ask('Enter the cloud region name')]
    public CloudRegion $region;

    #[Option]
    #[Ask('Enter the server size')]
    public ?ServerSize $size = null;
}
