<?php

namespace BrainGames\Games\Even;

const MIN_NUMBER = 1;
const MAX_NUMBER = 99;

function isEven(int $num)
{
    return $num % 2 == 0;
}

function getCorrectAnswer(int $num)
{
    return isEven($num) ? 'yes' : 'no';
}

function make()
{
    return [
        'description' => 'Answer "yes" if given number is even, otherwise answer "no".',
        'iteration' => function () {
            $question = rand(MIN_NUMBER, MAX_NUMBER);
            return [
                'question' => "$question",
                'answer' => getCorrectAnswer($question)
            ];
        }
    ];
}
