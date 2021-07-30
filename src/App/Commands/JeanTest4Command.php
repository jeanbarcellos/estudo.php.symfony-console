<?php

namespace App\Commands;

use Core\Command;
use Core\Command as AbstractCommand;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class JeanTest4Command extends AbstractCommand
{
    protected static $defaultName = 'jean:test4';

    protected function configure()
    {
        $this->setDescription('Testando criação de comando com argumentos');
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

        $this->table($output, ['Name', 'Email'], [
            ['Linha 1', 'test@teste.com'],
            ['Linha 2', 'test@teste.com'],
            ['Linha 3', 'test@teste.com'],
        ]);
        $output->writeln('');

        $nome = $this->ask($input, $output, "Qual o seu nome? ", "Jean");
        $output->writeln('');
        $output->writeln('Seu nome é: ' . $nome);
        $output->writeln('');

        if (!$this->confirm($input, $output, 'Você deseja continuar?', false)) {
            $output->writeln('<info>Ação confirmada</info>');
            return Command::SUCCESS;
        }

        $output->writeln('<error>Ação negada</error>');
        return Command::SUCCESS;
    }
}
