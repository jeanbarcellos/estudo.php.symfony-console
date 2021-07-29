<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;

class AskNameCommand extends Command
{
    protected function configure()
    {
        $this->setName('app:ask')
            ->setDescription('Interactively asks name from the user')
            ->setHelp('This command asks a user name interactively and prints it');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $helper = $this->getHelper('question');
        $question = new Question("Enter your name: ", "guest");

        $name = $helper->ask($input, $output, $question);
        $message = sprintf("Hello %s!", $name);

        $output->writeln($message);

        return Command::SUCCESS;
    }
}
