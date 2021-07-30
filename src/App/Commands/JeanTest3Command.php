<?php

namespace App\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class JeanTest3Command extends Command
{
    protected static $defaultName = 'jean:test3';

    protected function configure()
    {
        $this->setDescription('Testando criação de comando com argumentos');
        $this->setHelp('Demonstration of custom commands created by Symfony Console component.');

        $this->addArgument('nome', InputArgument::REQUIRED, 'Nome da pessoa');
        $this->addArgument('email', InputArgument::REQUIRED, 'Email da pessoa');
        $this->addArgument('sexo', InputArgument::OPTIONAL, 'Sexo da pessoa (opcional)');
        $this->addArgument('idade', InputArgument::OPTIONAL, 'Idade da pessoa (opcional com default)', 18);
        $this->addOption('sendmail', null, InputOption::VALUE_NONE, 'Deve enviar e-mail?');
        $this->addOption('port', null, InputOption::VALUE_OPTIONAL, 'Número da porta');
        $this->addOption('secury', null, InputOption::VALUE_OPTIONAL, 'Protocolo de segurança', 'ssl');
        $this->addOption('username', 'u', InputOption::VALUE_OPTIONAL, 'Usuário do serviço de email');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Executando o método ' . __METHOD__);
        $output->writeln('');

        $output->writeln('Arguments:');

        $table = new Table($output);
        $table->setHeaders(['Argument', 'Value']);
        $table->setRows([
            ['nome', $input->getArgument('nome')],
            ['email', $input->getArgument('email')],
            ['sexo', $input->getArgument('sexo')],
            ['idade', $input->getArgument('idade')],
        ]);
        $table->render();

        $output->writeln('');

        $output->writeln('Options:');

        $table = new Table($output);
        $table->setHeaders(['Option', 'Value']);
        $table->setRows([
            ['sendmail', $input->getOption('sendmail') ? 'true' : 'false'],
            ['port', $input->getOption('port')],
            ['secury', $input->getOption('secury')],
            ['username', $input->getOption('username')],
        ]);
        $table->render();

        return Command::SUCCESS;
    }
}
