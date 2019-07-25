<?php

namespace BrainGames\utils\random;


function rand_bool()
{
    return rand(0, 1) === 1;
}

function generateRandomNumbersWithCondition(int $min, int $max, callable $predicate, int $count)
{
    $numbers = [];
    for ($i = 0; $i < $count; $i++) {
        $numbers[] = rand($min, $max);
    }

    return $predicate($numbers) ? $numbers : generateRandomNumbersWithCondition($min, $max, $predicate, $count);
}

function generateRandomNumberWithCondition(int $min, int $max, callable $predicate)
{
    return generateRandomNumbersWithCondition($min, $max, function ($numbers) use ($predicate) {
        return $predicate($numbers[0]);
    }, 1)[0];
}
