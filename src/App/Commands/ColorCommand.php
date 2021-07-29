<?php

namespace App\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Formatter\OutputFormatterStyle;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ColorCommand extends Command
{
    protected static $defaultName = 'app:colc';

    protected function configure()
    {
        $this->setDescription('Shows output in color');
        $this->setHelp('This command shows output in color');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $output->writeln("<info>Today is a windy day</info>");

        $outputStyle = new OutputFormatterStyle('red');
        $output->getFormatter()->setStyle('redt', $outputStyle);

        $output->writeln('<redt>Tomorrow will be snowing</redt>');

        return Command::SUCCESS;
    }
}
