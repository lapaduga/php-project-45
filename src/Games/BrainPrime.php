<?php

namespace BrainGames\Games\BrainPrime;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\startGame;

use const BrainGames\Engine\MINIMUM_RND_NUMBER;
use const BrainGames\Engine\MAXIMUM_RND_NUMBER;

function startBrainPrime()
{
    $question = 'Answer "yes" if given number is prime. Otherwise answer "no".';

    $callback = function () {
        $number = rand(MINIMUM_RND_NUMBER, MAXIMUM_RND_NUMBER);
        $result = isPrime($number);
        line("Question: $number");
        $guess = prompt("Your answer");

        return handleData($result, $guess);
    };

    startGame($callback, $question);
}

function handleData(bool $result, string $guess): bool | array
{
    if ($result === true) {
        if ($guess === "yes") {
            return true;
        }

        return [$guess, "yes"];
    } else {
        if ($guess === "no") {
            return true;
        }

        return [$guess, "no"];
    }
}

/* function isPrime(int $number): bool
{
    if ($number == 2) {
        return true;
    }

    if ($number == 1 || $number % 2 == 0) {
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
} */

function isPrime(int $number): bool
{
    if ($number == 1) {
        return false;
    }

    if ($number == 2) {
        return true;
    }

    for ($i = 2; $i <= $number / 2; $i++) {
        if ($number % $i == 0) {
            return false;
        }
    }

    return true;
}
