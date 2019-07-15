<?php

namespace BrainGames\Engine;

const MAX_ROUNDS_COUNT = 3;

const GAME_RESULT_LOST = 0;
const GAME_RESULT_WON = 1;

function runRounds(callable $gameIterationGenerator, callable $print, callable $prompt, int $roundIndex = 0)
{
    if ($roundIndex >= MAX_ROUNDS_COUNT) {
        return GAME_RESULT_WON;
    }

    ['question' => $question, 'answer' => $correctAnswer] = $gameIterationGenerator();

    $print("Question: ${question}");

    $answer = $prompt('Your answer');

    if ($correctAnswer !== $answer) {
        $print("'${answer}' is the wrong answer ;(. The correct answer was '${correctAnswer}'.");
        return GAME_RESULT_LOST;
    }

    $print('Correct!');

    return runRounds($gameIterationGenerator, $print, $prompt, $roundIndex + 1);
}

function run($game, callable $print, callable $prompt)
{
    $print('Welcome to the Brain Game!');

    $print($game['description']);
    $print();

    $userName = $prompt('May I have your name?', false, ' ');
    $print("Hello, ${userName}!", $userName);

    $print();

    $gameResult = runRounds($game['iteration'], $print, $prompt);

    switch ($gameResult) {
        case GAME_RESULT_WON:
            $print("Congratulations, ${userName}!");
            break;
    }
}
