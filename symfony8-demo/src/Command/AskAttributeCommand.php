<?php

declare(strict_types=1);

namespace App\Command;

use App\Dto\AddServerInputAsk;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Attribute\Ask;
use Symfony\Component\Console\Attribute\MapInput;
use Symfony\Component\Console\Attribute\Option;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand('app:add-server-4')]
class AskAttributeCommand
{
    public function __invoke(
        InputInterface          $input,
        OutputInterface         $output,
        #[MapInput] AddServerInputAsk $server,
        #[Option, Ask('Pipa kucaj nesto')] string $pipa = 'pipa',
    ): int {
        $io = new SymfonyStyle($input, $output);
        $io->success('Success!');
        return Command::SUCCESS;
    }
}
