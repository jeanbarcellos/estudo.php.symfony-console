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
        // ... coloque aqui o código para criar o usuário

        // este método deve retornar um número inteiro com o "código de status de saída" do comando.
        // Você também pode usar essas constantes para tornar o código mais legível

        // retorna isto se não houve nenhum problema ao executar o comando
        // (é equivalente a retornar int (0))
        return Command::SUCCESS;

        // ou retorna se algum erro aconteceu durante a execução
        // (é equivalente a retornar int (1))
        // return Command::FAILURE;

        // ou retorne para indicar o uso incorreto do comando; por exemplo. opções inválidas
        // ou argumentos ausentes (é equivalente a retornar int (2))
        // return Command::INVALID
    }
}
