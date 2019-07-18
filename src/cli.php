<?php

namespace Braingames\cli;

use function \cli\line;
use function \cli\prompt;

function run($game)
{
    \Braingames\engine\run(
        $game,
        function (string $text = '') {
            line($text);
        },
        function (string $text = '', $default = false, string $marker = ': ') {
            return prompt($text, $default, $marker);
        }
    );
}

function runEven()
{
    run(\BrainGames\games\even\make());
}

function runCalc()
{
    run(\BrainGames\games\calc\make());
}

function runGcd()
{
    run(\BrainGames\games\gcd\make());
}

function runProgression()
{
    run(\BrainGames\games\progression\make());
}

function runPrime()
{
    run(\BrainGames\games\prime\make());
}
