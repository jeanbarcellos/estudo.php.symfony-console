<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;

class AskNameCommand extends Command
{
    protected static $defaultName = 'app:ask';

    protected function configure()
    {
        $this->setDescription('Interactively asks name from the user');
        $this->setHelp('This command asks a user name interactively and prints it');
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
