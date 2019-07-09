<?php

namespace BrainGames\Games\Calc;

const MIN_NUMBER = 0;
const MAX_NUMBER = 99;
const OPERATIONS = ['+', '-', '*'];

function evaluate(int $num1, int $num2, string $op)
{
    switch ($op) {
        case '+':
            return $num1 + $num2;
        case '-':
            return $num1 - $num2;
        case '*':
            return $num1 * $num2;
        default:
            throw new \Exception("Unsupported operation ${op}");
    }
}

function make()
{
    return [
        'description' => 'What is the result of the expression?',
        'iteration' => function () {
            $num1 = rand(MIN_NUMBER, MAX_NUMBER);
            $num2 = rand(MIN_NUMBER, MAX_NUMBER);
            $op = OPERATIONS[array_rand(OPERATIONS)];
            return [
                'question' => "${num1} ${op} ${num2}",
                'answer' => (string) evaluate($num1, $num2, $op)
            ];
        }
    ];
}
