<?php

namespace BrainGames\games\even;

const MIN_NUMBER = 1;
const MAX_NUMBER = 99;

function isEven(int $num)
{
    return $num % 2 == 0;
}

function make()
{
    return [
        'description' => 'Answer "yes" if given number is even, otherwise answer "no".',
        'iteration' => function () {
            $question = rand(MIN_NUMBER, MAX_NUMBER);
            $correctAnswer = isEven($question) ? 'yes' : 'no';
            return [
                'question' => "$question",
                'answer' => $correctAnswer
            ];
        }
    ];
}
