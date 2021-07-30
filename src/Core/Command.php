<?php

namespace Core;

use Symfony\Component\Console\Command\Command as CommandSymfony;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ConfirmationQuestion;
use Symfony\Component\Console\Question\Question;

abstract class Command extends CommandSymfony
{
    protected function table(OutputInterface $output, array $header, array $rows): void
    {
        $table = new Table($output);
        $table->setHeaders($header);
        $table->setRows($rows);
        $table->render();
    }

    protected function ask(InputInterface $input, OutputInterface $output, string $question, $default = null)
    {
        $helper = $this->getHelper('question');

        $question = new Question($question, $default);

        return $helper->ask($input, $output, $question);
    }

    protected function confirm(InputInterface $input, OutputInterface $output, string $question, bool $default = true)
    {
        $helper = $this->getHelper('question');

        $question = new ConfirmationQuestion($question, $default);

        return $helper->ask($input, $output, $question);
    }

}
