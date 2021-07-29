<?php

require __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Console\Application;

$application = new Application();

$commands = require __DIR__ . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'commands.php';

foreach ($commands as $commandName) {
    $application->add(new $commandName);
}

$application->run();
