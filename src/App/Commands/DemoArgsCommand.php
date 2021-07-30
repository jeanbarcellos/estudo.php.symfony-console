<?php

namespace App\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputDefinition;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @see https://symfony.com/doc/current/console/input.html
 */
class DemoArgsCommand extends Command
{
    protected static $defaultName = 'demo:args';

    protected function configure()
    {
        $this
            ->setDescription('Describe args behaviors')
            ->setDefinition(
                new InputDefinition([
                    new InputOption('foo', 'f'),
                    new InputOption('bar', 'b', InputOption::VALUE_REQUIRED),
                    new InputOption('cat', 'c', InputOption::VALUE_OPTIONAL),
                ])
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        dump([
            'foo' => $input->getOption('foo'),
            'bar' => $input->getOption('bar'),
            'cat' => $input->getOption('cat'),
        ]);

        return Command::SUCCESS;
    }
}
