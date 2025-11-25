<?php

declare(strict_types=1);

namespace App\Command;

use App\Dto\AddServerInput;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Attribute\MapInput;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand('app:add-server-2')]
class NewMapInputAttributeCommand
{
    public function __invoke(
        InputInterface          $input,
        OutputInterface         $output,
        #[MapInput] AddServerInput $server,
    ): int {
        $io = new SymfonyStyle($input, $output);
        $io->success('Success!');
        return Command::SUCCESS;
    }
}
