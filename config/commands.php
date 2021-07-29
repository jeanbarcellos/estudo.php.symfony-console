<?php

use App\Command\ClearCacheCommand;
use App\Command\CreateUserCommand;
use App\Command\GreetCommand;
use App\Command\HelloWorldCommand;
use App\Command\MyCommand;
use App\Command\TimeCommand;

return [
    CreateUserCommand::class,
    MyCommand::class,
    GreetCommand::class,
    HelloWorldCommand::class,
    ClearCacheCommand::class,
    TimeCommand::class,
];
