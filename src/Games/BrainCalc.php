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

        switch ($randomOperation) {
            case '+':
                    $result = $randomNumber1 + $randomNumber2;
                break;
            case '-':
                    $result = $randomNumber1 - $randomNumber2;
                break;
            default:
                    $result = $randomNumber1 * $randomNumber2;
                break;
        }

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
