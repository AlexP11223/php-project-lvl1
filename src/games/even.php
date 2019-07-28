<?php

namespace BrainGames\games\even;

const DESCRIPTION = 'Answer "yes" if given number is even, otherwise answer "no".';

const MIN = 1;
const MAX = 99;

function isEven(int $num)
{
    return $num % 2 == 0;
}

function run()
{
    $generateRoundData = function () {
        $question = rand(MIN, MAX);
        $correctAnswer = isEven($question) ? 'yes' : 'no';
        return [
            'question' => "$question",
            'answer' => $correctAnswer
        ];
    };

    \Braingames\engine\run($generateRoundData, DESCRIPTION);
}
