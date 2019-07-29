<?php

namespace BrainGames\games\gcd;

use function Braingames\engine\run as runEngine;
use function BrainGames\utils\random\generateRandomNumbersWithCondition;

const DESCRIPTION = 'Find the greatest common divisor of given numbers.';

const MIN = 2;
const MAX = 100;

function gcd(int $num1, int $num2)
{
    return $num2 === 0 ? $num1 : gcd($num2, $num1 % $num2);
}

function generateInterestingQuestion($min, $max)
{
    // most numbers have GCD == 1, so we exclude such numbers to make the game more interesting
    return generateRandomNumbersWithCondition($min, $max, function ($numbers) {
        return gcd($numbers[0], $numbers[1]) > 1;
    }, 2);
}

function run()
{
    $generateRoundData = function () {
        [$num1, $num2] = generateInterestingQuestion(MIN, MAX);
        return [
            'question' => "$num1 $num2",
            'answer' => (string)gcd($num1, $num2)
        ];
    };

    runEngine($generateRoundData, DESCRIPTION);
}
