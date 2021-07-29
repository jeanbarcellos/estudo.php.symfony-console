<?php

namespace App\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\ConsoleOutputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MyCommand extends Command
{
    protected static $defaultName = 'app:my-user';

    protected function configure(): void
    {
        $this->setDescription('Comando test.');
        $this->setHelp('This command allows ...');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        if (!$output instanceof ConsoleOutputInterface) {
            throw new \LogicException('This command accepts only an instance of "ConsoleOutputInterface".');
        }

        $section1 = $output->section();
        $section2 = $output->section();

        $section1->writeln('Hello');
        $section2->writeln('World!');
        // Output displays "Hello\nWorld!\n"

        // overwrite() substitui todo o conteúdo da seção existente pelo conteúdo fornecido
        $section1->overwrite('Goodbye');
        // Output now displays "Goodbye\nWorld!\n"

        // clear() apaga todo o conteúdo da seção...
        $section2->clear();
        // Output now displays "Goodbye\n"

        // ...mas você também pode deletar um determinado número de linhas
        // (este exemplo exclui as duas últimas linhas da seção)
        $section1->clear(2);
        // Output is now completely empty!

        return Command::SUCCESS;
    }
}
