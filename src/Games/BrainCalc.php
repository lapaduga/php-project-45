<?php

namespace BrainGames\Games\BrainCalc;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\startGame;

use const BrainGames\Engine\MINIMUM_RND_NUMBER;
use const BrainGames\Engine\MAXIMUM_RND_NUMBER;

function startBrainCalc()
{
    $question = "What is the result of the expression?";

    $callback = function () {
        $operations = ["+", "-", "*"];
        $randomNumber1 = rand(MINIMUM_RND_NUMBER, MAXIMUM_RND_NUMBER);
        $randomNumber2 = rand(MINIMUM_RND_NUMBER, MAXIMUM_RND_NUMBER);
        $randomOperation = $operations[rand(MINIMUM_RND_NUMBER, count($operations) - 1)];
        $result = null;

        $result = getResult($randomNumber1, $randomNumber2, $randomOperation);

        line("Question: $randomNumber1 $randomOperation $randomNumber2");
        $answer = prompt("Your answer");

        if ((int)$answer === $result) {
            return true;
        } else {
            return [$answer, $result];
        }
    };

    startGame($callback, $question);
}

function getResult(int $number1, int $number2, string $operand): int
{
    switch ($operand) {
        case '+':
            return $number1 + $number2;
        case '-':
            return $number1 - $number2;
        default:
            return $number1 * $number2;
    }
}
