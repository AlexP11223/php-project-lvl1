<?php

namespace BrainGames\games\progression;

const DESCRIPTION = 'What number is missing in the progression?';

const PROGRESSION_ELEMENTS_COUNT = 10;
const MIN_INCREMENT = -20;
const MAX_INCREMENT = 20;
const MIN_START_NUMBER = 0;
const MAX_START_NUMBER = 100;

function generateProgression($start, $diff, $elementsCount)
{
    $result = [];
    for ($i = 0; $i < $elementsCount; $i++) {
        $result[] = $start + $diff * $i;
    }
    return $result;
}

function run()
{
    $iteration = function () {
        $progression = generateProgression(
            rand(MIN_START_NUMBER, MAX_START_NUMBER),
            rand(MIN_INCREMENT, MAX_INCREMENT),
            PROGRESSION_ELEMENTS_COUNT
        );
        $missingElementIndex = array_rand($progression);
        $answer = $progression[$missingElementIndex];
        $progression[$missingElementIndex] = '..';
        return [
            'question' => implode(' ', $progression),
            'answer' => (string) $answer
        ];
    };

    \Braingames\engine\run($iteration, DESCRIPTION);
}
