<?php

require __DIR__ . '/vendor/autoload.php';

use App\Command\CreateUserCommand;
use App\Command\GreetCommand;
use App\Command\MyCommand;
use Symfony\Component\Console\Application;

$application = new Application();

// ... register commands
$application->add(new CreateUserCommand());
$application->add(new MyCommand());
$application->add(new GreetCommand());

$application->run();
