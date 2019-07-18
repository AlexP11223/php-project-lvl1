<?php

namespace BrainGames\games\progression;

const PROGRESSION_LENGTH = 10;
const MIN_INCREMENT = -20;
const MAX_INCREMENT = 20;
const MIN_START_NUMBER = 0;
const MAX_START_NUMBER = 100;

function generateProgression()
{
    $start_num = rand(MIN_START_NUMBER, MAX_START_NUMBER);
    $increment = rand(MIN_INCREMENT, MAX_INCREMENT);

    $result = [];
    for ($i = 0; $i < PROGRESSION_LENGTH; $i++) {
        $result[] = $start_num + $increment * $i;
    }
    return $result;
}

function make()
{
    return [
        'description' => 'What number is missing in the progression?',
        'iteration' => function () {
            $progression = generateProgression();
            $missingElementIndex = array_rand($progression);
            $missingElement = $progression[$missingElementIndex];
            $progression[$missingElementIndex] = '..';
            return [
                'question' => implode(' ', $progression),
                'answer' => (string) $missingElement
            ];
        }
    ];
}
