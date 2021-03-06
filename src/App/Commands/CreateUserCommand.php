<?php

namespace App\Commands;

use App\Entites\User;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
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
        // a breve descrição mostrada durante a execução do comando
        $this->setDescription('Creates a new user.');

        // a descrição completa do comando mostrada ao executar o comando com a opção "--help"
        $this->setHelp('This command allows you to create a user...');

        // configure an argument
        $this->addArgument('name', InputArgument::REQUIRED, 'The name of the user.');
        $this->addArgument('email', InputArgument::REQUIRED, 'The email of the user.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        // envia várias linhas para o console (adicionando "\n" no final de cada linha)
        $output->writeln([
            'User Creator',
            '============',
            '',
        ]);

        $user = new User($input->getArgument('name'), $input->getArgument('email'));

        $output->writeln('Name: ' . $user->getName());
        $output->writeln('E-mail: ' . $user->getEmail());

        $output->writeln('');
        $output->writeln('User successfully generated!');

        return Command::SUCCESS;
    }
}
