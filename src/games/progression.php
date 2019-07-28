<?php

namespace BrainGames\games\progression;

const DESCRIPTION = 'What number is missing in the progression?';

const PROGRESSION_LENGTH = 10;
const MIN_DIFF = -20;
const MAX_DIFF = 20;
const MIN_START = 0;
const MAX_START = 100;

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
            rand(MIN_START, MAX_START),
            rand(MIN_DIFF, MAX_DIFF),
            PROGRESSION_LENGTH
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
