<?php

namespace BrainGames\games\prime;

use function Braingames\engine\run as runEngine;
use function BrainGames\utils\random\rand_bool;
use function BrainGames\utils\random\generateRandomNumberWithCondition;

const DESCRIPTION = 'Answer "yes" if given number is prime, otherwise answer "no".';

const MIN = 2;
const MAX = 200;

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

function generateInterestingQuestion($min, $max)
{
    $answer = rand_bool(); // 50% chance of prime numbers, otherwise most numbers will be not primes
    return generateRandomNumberWithCondition($min, $max, function ($n) use ($answer) {
        return isPrime($n) === $answer;
    });
}

function run()
{
    $generateRoundData = function () {
        $question = generateInterestingQuestion(MIN, MAX);
        $correctAnswer = isPrime($question) ? 'yes' : 'no';
        return [
            'question' => "$question",
            'answer' => $correctAnswer
        ];
    };

    runEngine($generateRoundData, DESCRIPTION);
}
