<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateUserCommand extends Command
{
    // o nome do comando
    protected static $defaultName = 'app:create-user';

    public function __construct(bool $requirePassword = false)
    {
        // as melhores práticas recomendam chamar o construtor pai primeiro e, em seguida,
        // definir suas próprias propriedades. Isso não funcionaria neste caso porque
        // configure() precisa das propriedades definidas neste construtor
        $this->requirePassword = $requirePassword;

        parent::__construct();
    }

    protected function configure(): void
    {
        $this
        // a breve descrição mostrada durante a execução do comando
        ->setDescription('Creates a new user.')

        // a descrição completa do comando mostrada ao executar o comando com a opção "--help"
            ->setHelp('This command allows you to create a user...');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        // envia várias linhas para o console (adicionando "\n" no final de cada linha)
        $output->writeln([
            'User Creator',
            '============',
            '',
        ]);

        // o valor retornado por someMethod() pode ser um iterador (https://secure.php.net/iterator)
        // que gera e retorna as mensagens com a palavra-chave PHP 'yield'
        // $output->writeln($this->someMethod());

        // produz uma mensagem seguida por um "\n"
        $output->writeln('Whoa!');

        // gera uma mensagem sem adicionar um "\n" no final da linha
        $output->write('You are about to ');
        $output->write('create a user.');

        return Command::SUCCESS;
    }
}
