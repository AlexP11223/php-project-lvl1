<?php

namespace BrainGames\Engine;

const MAX_CORRECT_ANSWERS_COUNT = 3;

function run(string $gameName, callable $print, callable $prompt)
{
    $games = [
        'even' => \BrainGames\Games\Even\make(),
        'calc' => \BrainGames\Games\Calc\make(),
        'gcd' => \BrainGames\Games\Gcd\make(),
        'progression' => \BrainGames\Games\Progression\make(),
        'prime' => \BrainGames\Games\Prime\make(),
    ];

    $game = null;
    if (array_key_exists($gameName, $games)) {
        $game = $games[$gameName];
    }

    if ($game) {
        $print($game['description']);
    }

    $print();

    $userName = $prompt('May I have your name?', false, ' ');
    $print("Hello, ${userName}!", $userName);

    if (!$game) {
        return;
    }

    $print();

    $correctAnswersCount = 0;
    while (true) {
        ['question' => $question, 'answer' => $correctAnswer] = $game['iteration']();

        $print("Question: ${question}");

        $answer = $prompt('Your answer');

        if ($correctAnswer === $answer) {
            $print('Correct!');
            $correctAnswersCount++;

            if ($correctAnswersCount === MAX_CORRECT_ANSWERS_COUNT) {
                $print("Congratulations, ${userName}!");
                break;
            }
        } else {
            $print("'${answer}' is the wrong answer ;(. The correct answer was '${correctAnswer}'.");
            break;
        }
    }
}
