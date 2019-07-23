<?php

namespace BrainGames\games\prime;

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

function rand_bool()
{
    return rand(0, 1) === 1;
}

function generateNumberUntil(int $min, int $max, callable $predicate)
{
    $num = rand($min, $max);
    return $predicate($num) ? $num : generateNumberUntil($min, $max, $predicate);
}

function make()
{
    return [
        'description' => 'Answer "yes" if given number is prime, otherwise answer "no".',
        'iteration' => function () {
            $isPrime = rand_bool();
            $question = generateNumberUntil(MIN_NUMBER, MAX_NUMBER, function ($n) use ($isPrime) {
                return isPrime($n) === $isPrime;
            });
            $correctAnswer = isPrime($question) ? 'yes' : 'no';
            return [
                'question' => "$question",
                'answer' => $correctAnswer
            ];
        }
    ];
}
