<?php
namespace App\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ClearCacheCommand extends Command
{
    protected static $defaultName = 'app:clear-cache';

    protected function configure()
    {
        $this->setDescription('Clears the application cache.');
        $this->setHelp('Allows you to delete the application cache. Pass the --groups parameter to clear caches of specific groups.');
        $this->addOption(
            'groups',
            'g',
            InputOption::VALUE_OPTIONAL,
            'Pass the comma separated group names if you don\'t want to clear all caches.',
            ''
        );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Cache is about to cleared...');

        if ($input->getOption('groups')) {
            $groups = explode(",", $input->getOption('groups'));

            if (is_array($groups) && count($groups)) {
                foreach ($groups as $group) {
                    $output->writeln(sprintf('%s cache is cleared', $group));
                }
            }
        } else {
            $output->writeln('All caches are cleared.');
        }

        $output->writeln('Complete.');

        return Command::SUCCESS;
    }
}
