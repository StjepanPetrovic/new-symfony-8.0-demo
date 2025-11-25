<?php

declare(strict_types=1);

namespace App\Command;

use App\Enum\CloudRegion;
use App\Enum\ServerSize;
use Symfony\Component\Console\Attribute\Argument;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Attribute\Option;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand('app:add-server-1')]
class EnumSupportCommand
{
    public function __invoke(
        InputInterface          $input,
        OutputInterface         $output,
        #[Argument] CloudRegion $region,
        #[Option] ?ServerSize   $size = null,
    ): int {
        $io = new SymfonyStyle($input, $output);
        $io->success('Success!');
        return Command::SUCCESS;
    }
}
