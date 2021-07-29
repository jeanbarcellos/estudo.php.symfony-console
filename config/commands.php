<?php

use App\Command\MyCommand;
use App\Command\GreetCommand;
use App\Command\CreateUserCommand;
use App\Command\ClearCacheCommand;

return [
    CreateUserCommand::class,
    MyCommand::class,
    GreetCommand::class,
    ClearCacheCommand::class,
];
