<?php

namespace BrainGames\games\calc;

const MIN_NUMBER = 0;
const MAX_NUMBER = 99;
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

function make()
{
    return [
        'description' => 'What is the result of the expression?',
        'iteration' => function () {
            $num1 = rand(MIN_NUMBER, MAX_NUMBER);
            $num2 = rand(MIN_NUMBER, MAX_NUMBER);
            $operation = OPERATIONS[array_rand(OPERATIONS)];
            return [
                'question' => "$num1 $operation $num2",
                'answer' => (string) evaluate($num1, $num2, $operation)
            ];
        }
    ];
}
