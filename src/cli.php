<?php

namespace BrainGames\Cli;

use function \cli\line;
use function \cli\prompt;

function run(string $gameName)
{
    $games = [
        'even' => \BrainGames\Games\Even\make(),
        'calc' => \BrainGames\Games\Calc\make(),
        'gcd' => \BrainGames\Games\Gcd\make(),
        'progression' => \BrainGames\Games\Progression\make(),
        'prime' => \BrainGames\Games\Prime\make(),
    ];

    $game = array_key_exists($gameName, $games) ? $games[$gameName] : null;

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
