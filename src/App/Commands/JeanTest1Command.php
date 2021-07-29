<?php

namespace App\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class JeanTest1Command extends Command
{
    protected static $defaultName = 'jean:test1';

    protected function configure()
    {
        $this->setDescription('Testando escritas na tela');
        $this->setHelp('Demonstration of custom commands created by Symfony Console component.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Executando o método ' . __METHOD__);
        $output->writeln('');

        $output->writeln('Escrevendo uma linha 1');
        $output->writeln('Escrevendo uma linha 2');
        $output->writeln('');

        $output->writeln('<info>Escrever string como saída de informação</info>');
        $output->writeln('');

        $output->writeln('<comment>Escrever string como saída de comentário</comment>');
        $output->writeln('');

        $output->writeln('<question>Escrever string como saída da pergunta</question>');
        $output->writeln('');

        $output->writeln('<error>Escrever string como saída de erro</error>');
        $output->writeln('');

        $table = new Table($output);
        $table->setHeaders(['Name', 'Email']);
        $table->setRows([
            ['Linha 1', 'test@teste.com'],
            ['Linha 2', 'test@teste.com'],
            ['Linha 3', 'test@teste.com'],
        ]);
        $table->render();

        return Command::SUCCESS;
    }
}
