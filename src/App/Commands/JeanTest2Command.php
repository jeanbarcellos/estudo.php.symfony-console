<?php

namespace App\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ConfirmationQuestion;
use Symfony\Component\Console\Question\Question;

class JeanTest2Command extends Command
{
    protected static $defaultName = 'jean:test2';

    protected function configure()
    {
        $this->setDescription('Testando interação com o usuário (solicitação de dados)');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Executando o método ' . __METHOD__);
        $output->writeln('');

        $helper = $this->getHelper('question');

        $question = new Question("Qual o seu nome? ", "");
        $nome = $helper->ask($input, $output, $question);

        $question = new Question("Qual a sua idade? ", "");
        $idade = $helper->ask($input, $output, $question);

        $question = new Question("Informe uma senha: ", "");
        $question->setHidden(true);
        $senha = $helper->ask($input, $output, $question);

        $output->writeln('Seus dados são os seguintes:');
        $output->writeln('Nome: ' . $nome);
        $output->writeln('Idade: ' . $idade);
        $output->writeln('Senha: ' . $senha);
        $output->writeln('');

        $question = new ConfirmationQuestion('Você deseja continuar? [y|n]', false);
        if (!$helper->ask($input, $output, $question)) {
            $output->writeln('<info>Ação confirmada</info>');
            return Command::SUCCESS;
        }

        $output->writeln('<error>Ação negada</error>');
        return Command::FAILURE;
    }
}
