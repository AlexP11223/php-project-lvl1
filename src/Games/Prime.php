<?php

namespace BrainGames\Games\Prime;

const MIN_NUMBER = 2;
const MAX_NUMBER = 200;

function isPrime(int $num)
{
    if ($num < 2) {
        return false;
    }
    for ($i = 2, $maxDivisor = sqrt($num); $i <= $maxDivisor; $i++) {
        if ($num % $i === 0) {
            return false;
        }
    }
    return true;
}

function getCorrectAnswer(int $num)
{
    return isPrime($num) ? 'yes' : 'no';
}

function rand_bool()
{
    return rand(0, 1) === 1;
}

function generateNumberUntil(callable $predicate)
{
    $num = rand(MIN_NUMBER, MAX_NUMBER);
    return $predicate($num) ? $num : generateNumberUntil($predicate);
}

function make()
{
    return [
        'description' => 'Answer "yes" if given number is prime, otherwise answer "no".',
        'iteration' => function () {
            $isPrime = rand_bool();
            $num = generateNumberUntil(function ($n) use ($isPrime) {
                return isPrime($n) === $isPrime;
            });
            return [
                'question' => "${num}",
                'answer' => getCorrectAnswer($num)
            ];
        }
    ];
}
