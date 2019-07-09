<?php

namespace BrainGames\Cli;

use function \cli\line;
use function \cli\prompt;

function run(string $game = '')
{
    line('Welcome to the Brain Game!');

    \BrainGames\Engine\run(
        $game,
        function (string $text = '') {
            line($text);
        },
        function (string $text = '', $default = false, string $marker = ': ') {
            return prompt($text, $default, $marker);
        }
    );
}
