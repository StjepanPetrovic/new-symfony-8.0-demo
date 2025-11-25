<?php

declare(strict_types=1);

namespace App\Command;

use App\Dto\AddServerInput;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Attribute\Interact;
use Symfony\Component\Console\Attribute\MapInput;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand('app:add-server-3')]
class InteractAttributeCommand
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

    #[Interact]
    public function prompt(InputInterface $input, SymfonyStyle $io): void
    {
        if (!$input->getArgument('region')) {
            $input->setArgument('region', $io->ask('Enter the cloud region name'));
        }

        if (!$input->getOption('size')) {
            $input->setOption('size', $io->ask('Enter the server size'));
        }
    }
}
