<?php

namespace BrainGames\games\calc;

const DESCRIPTION = 'What is the result of the expression?';

const MIN = 0;
const MAX = 99;
const OPERATIONS = ['+', '-', '*'];

function evaluate(int $num1, int $num2, string $operation)
{
    switch ($operation) {
        case '+':
            return $num1 + $num2;
        case '-':
            return $num1 - $num2;
        case '*':
            return $num1 * $num2;
        default:
            throw new \Exception("Unsupported operation $operation");
    }
}

function run()
{
    $generateRoundData = function () {
        $num1 = rand(MIN, MAX);
        $num2 = rand(MIN, MAX);
        $operation = OPERATIONS[array_rand(OPERATIONS)];
        return [
            'question' => "$num1 $operation $num2",
            'answer' => (string) evaluate($num1, $num2, $operation)
        ];
    };

    \Braingames\engine\run($generateRoundData, DESCRIPTION);
}
