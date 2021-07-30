<?php

require __DIR__ . '/vendor/autoload.php';

use Core\Helper;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\CommandLoader\FactoryCommandLoader;

// Obter o nome dos arquivos do diretório
$commandNames = Helper::listFiles(join(DIRECTORY_SEPARATOR, [__DIR__, 'src', 'App', 'Commands']), false);

// Adição do namespace
$commandNames = array_map(fn($commandName) => "App\\Commands\\" . $commandName, $commandNames);

// Montar o array com os comandos e seus devidos commands
$factories = array_reduce($commandNames, function ($carry, $commandName) {
    // Pode-se utilizar um container de injeção de dependência para resolver o command
    $command = new $commandName();
    $carry[$commandName::getDefaultName()] = fn() => $command;
    return $carry;
}, []);

$commandLoader = new FactoryCommandLoader($factories);

$application = new Application();
$application->setCommandLoader($commandLoader);
$application->run();
