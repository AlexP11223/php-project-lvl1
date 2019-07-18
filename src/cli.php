<?php

namespace Braingames\cli;

use function \cli\line;
use function \cli\prompt;

function run(string $gameName)
{
    $games = [
        'even' => \BrainGames\games\even\make(),
        'calc' => \BrainGames\games\calc\make(),
        'gcd' => \BrainGames\games\gcd\make(),
        'progression' => \BrainGames\games\progression\make(),
        'prime' => \BrainGames\games\prime\make(),
    ];

    $game = array_key_exists($gameName, $games) ? $games[$gameName] : null;

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
