<?php

namespace App\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class HelloWorldCommand extends Command
{
    protected static $defaultName = 'app:hello-world';

    protected function configure()
    {
        $this->setDescription('Prints Hello-World!')
            ->setHelp('Demonstration of custom commands created by Symfony Console component.')
            ->addArgument('username', InputArgument::REQUIRED, 'Pass the username.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln(sprintf('Hello World!, %s', $input->getArgument('username')));

        return Command::SUCCESS;
    }
}
