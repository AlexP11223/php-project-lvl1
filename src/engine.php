<?php

namespace Braingames\engine;

use function \cli\line;
use function \cli\prompt;

const MAX_ROUNDS_COUNT = 3;

const GAME_RESULT_LOST = 0;
const GAME_RESULT_WON = 1;

function runRounds(callable $gameIterationGenerator, int $roundIndex = 0)
{
    if ($roundIndex >= MAX_ROUNDS_COUNT) {
        return GAME_RESULT_WON;
    }

    ['question' => $question, 'answer' => $correctAnswer] = $gameIterationGenerator();

    line("Question: ${question}");

    $answer = prompt('Your answer');

    if ($correctAnswer !== $answer) {
        line("'${answer}' is the wrong answer ;(. The correct answer was '${correctAnswer}'.");
        return GAME_RESULT_LOST;
    }

    line('Correct!');

    return runRounds($gameIterationGenerator, $roundIndex + 1);
}

function run(callable $gameIterationGenerator, string $description)
{
    line('Welcome to the Brain Game!');

    line($description);
    line();

    $userName = prompt('May I have your name?', false, ' ');
    line("Hello, ${userName}!", $userName);

    line();

    $gameResult = runRounds($gameIterationGenerator);

    switch ($gameResult) {
        case GAME_RESULT_WON:
            line("Congratulations, ${userName}!");
            break;
    }
}
