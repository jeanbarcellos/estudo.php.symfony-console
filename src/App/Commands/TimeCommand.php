<?php

namespace App\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TimeCommand extends Command
{
    protected static $defaultName = 'app:time';

    protected function configure()
    {
        $this->setDescription('Shows current date and time');
        $this->setHelp('This command prints the current date and time');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $now = date('c');
        $message = sprintf("Current date and time: %s", $now);

        $output->writeln($message);

        return Command::SUCCESS;
    }
}
