<?php

namespace Braingames\engine;

use function \cli\line;
use function \cli\prompt;

const MAX_ROUNDS_COUNT = 3;

function run(callable $generateRoundData, string $description)
{
    line('Welcome to the Brain Game!');

    line($description);
    line();

    $userName = prompt('May I have your name?', false, ' ');
    line("Hello, ${userName}!", $userName);

    line();

    $runRound = function (int $i) use ($generateRoundData, $userName, &$runRound) {
        if ($i >= MAX_ROUNDS_COUNT) {
            line("Congratulations, ${userName}!");
            return;
        }

        ['question' => $question, 'answer' => $correctAnswer] = $generateRoundData();

        line("Question: ${question}");

        $answer = prompt('Your answer');

        if ($correctAnswer !== $answer) {
            line("'${answer}' is the wrong answer ;(. The correct answer was '${correctAnswer}'.");
            return;
        }

        line('Correct!');

        $runRound($i + 1);
    };

    $runRound(0);
}
