<?php

namespace BrainGames\Cli;

use function \cli\line;
use function cli\prompt;

function promptName(): string
{
    $name = prompt('May I have your name?', false, ' ');
    line("Hello, %s!", $name);
    line();
    return $name;
}

function run(string $game = '')
{
    line('Welcome to the Brain Game!');

    switch ($game) {
        case 'even':
            \BrainGames\Games\Even\run();
            break;
        default:
            promptName();
            break;
    }
}
