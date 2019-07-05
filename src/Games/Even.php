<?php

namespace BrainGames\Games\Even;

use function BrainGames\Cli\promptName;
use function \cli\line;
use function cli\prompt;

const MAX_CORRECT_ANSWERS_COUNT = 3;
const MIN_NUMBER = 1;
const MAX_NUMBER = 99;

function getCorrectAnswer(int $num)
{
    return $num % 2 == 0 ? 'yes' : 'no';
}

function run()
{
    line('Answer "yes" if a number is even, otherwise answer "no".');
    line();

    $name = promptName();

    $correctAnswersCount = 0;
    while (true) {
        $num = rand(MIN_NUMBER, MAX_NUMBER);
        line("Question: ${num}");

        $answer = prompt('Your answer');

        $correctAnswer = getCorrectAnswer($num);
        if ($correctAnswer === $answer) {
            line('Correct!');
            $correctAnswersCount++;

            if ($correctAnswersCount === MAX_CORRECT_ANSWERS_COUNT) {
                line("Congratulations, ${name}!");
                break;
            }
        } else {
            line("'${answer}' is the wrong answer ;(. The correct answer was '${correctAnswer}'.");
            break;
        }
    }
}
