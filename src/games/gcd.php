<?php

namespace BrainGames\games\gcd;

const MIN_NUMBER = 2;
const MAX_NUMBER = 100;

function gcd(int $num1, int $num2)
{
    return $num2 === 0 ? $num1 : gcd($num2, $num1 % $num2);
}

function generateNumbersWithInterestingGcd(int $min, int $max)
{
    $num1 = rand($min, $max);
    $num2 = rand($min, $max);
    return gcd($num1, $num2) === 1 ? generateNumbersWithInterestingGcd($min, $max) : [$num1, $num2];
}

function make()
{
    return [
        'description' => 'Find the greatest common divisor of given numbers.',
        'iteration' => function () {
            [$num1, $num2] = generateNumbersWithInterestingGcd(MIN_NUMBER, MAX_NUMBER);
            return [
                'question' => "$num1 $num2",
                'answer' => (string)gcd($num1, $num2)
            ];
        }
    ];
}
