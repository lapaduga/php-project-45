<?php

namespace BrainGames\Games\BrainCalc;

use function BrainGames\Engine\startGame;

use const BrainGames\Engine\MINIMUM_RND_NUMBER;
use const BrainGames\Engine\MAXIMUM_RND_NUMBER;

function startBrainCalc()
{
    $description = 'What is the result of the expression?';

    $callback = function () {
        $operations = ['+', '-', '*'];
        $randomNumber1 = rand(MINIMUM_RND_NUMBER, MAXIMUM_RND_NUMBER);
        $randomNumber2 = rand(MINIMUM_RND_NUMBER, MAXIMUM_RND_NUMBER);
        $randomOperation = $operations[array_rand($operations, 1)];

        $result = getResult($randomNumber1, $randomNumber2, $randomOperation);

        return [
            'question' => "{$randomNumber1} {$randomOperation} {$randomNumber2}",
            'correctAnswer' => $result
        ];
    };

    startGame($callback, $description);
}

function getResult(int $number1, int $number2, string $operator)
{
    switch ($operator) {
        case '+':
            return $number1 + $number2;
        case '-':
            return $number1 - $number2;
        case '*':
            return $number1 * $number2;
        default:
            break;
    }
}
