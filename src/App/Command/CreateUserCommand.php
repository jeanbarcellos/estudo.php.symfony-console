<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateUserCommand extends Command
{
    // o nome do comando
    protected static $defaultName = 'app:create-user';

    protected function configure(): void
    {
        // ...
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
