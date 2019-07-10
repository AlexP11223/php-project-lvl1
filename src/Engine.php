<?php

namespace BrainGames\Engine;

const MAX_CORRECT_ANSWERS_COUNT = 3;

function run($game, callable $print, callable $prompt)
{
    $print('Welcome to the Brain Game!');

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
