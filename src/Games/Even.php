<?php

namespace BrainGames\Games\Even;

const MIN_NUMBER = 1;
const MAX_NUMBER = 99;

function getCorrectAnswer(int $num)
{
    return $num % 2 == 0 ? 'yes' : 'no';
}

function make()
{
    return [
        'description' => 'Answer "yes" if a number is even, otherwise answer "no".',
        'iteration' => function () {
            $num = rand(MIN_NUMBER, MAX_NUMBER);
            return [
                'question' => "${num}",
                'answer' => getCorrectAnswer($num)
            ];
        }
    ];
}
