<?php

namespace BrainGames\Games\BrainPrime;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\startGame;

function startBrainPrime()
{
    $question = 'Answer "yes" if given number is prime. Otherwise answer "no".';

    $callback = function () {
        $number = rand(MINIMUM_RND_NUMBER, MAXIMUM_RND_NUMBER);
        $result = isPrime($number);
        line("Question: $number");
        $guess = prompt("Your answer");

        if ($result === true) {
            if ($guess === "yes") {
                return true;
            } else {
                return [$guess, "yes"];
            }
        } else {
            if ($guess === "no") {
                return true;
            } else {
                return [$guess, "no"];
            }
        }
    };

    startGame($callback, $question);
}

function isPrime(int $number)
{
    if ($number == 2) {
        return true;
    }

    if ($number == 1) {
        return false;
    }

    if ($number % 2 == 0) {
        return false;
    }

    $i = 3;
    $max_factor = (int)sqrt($number);

    while ($i <= $max_factor) {
        if ($number % $i == 0) {
            return false;
        }

        $i += 2;
    }

    return true;
}
