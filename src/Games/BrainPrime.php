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

function handleData(bool $result, string $guess)
{
    $newResult = true;

    if ($result) {
        $newResult = handlePrimeCase($guess);
    } else {
        $newResult = handleNotPrimeCase($guess);
    }

    return $newResult;
}

function handlePrimeCase(string $guess)
{
    return $guess === "yes" ? true : [$guess, "yes"];
}

function handleNotPrimeCase(string $guess)
{
    return $guess === "no" ? true : [$guess, "no"];
}

function isPrime(int $number): bool
{
    $result = true;

/*     if ($number == 2) {
        $result = true;
    }

    if ($number == 1 || $number % 2 == 0) {
        $result = false;
    } */

    $result = handleSimpleCases($number);

    $i = 3;
    $max_factor = (int)sqrt($number);

    while ($i <= $max_factor) {
        if ($number % $i == 0) {
            $result = false;
        }

        $i += 2;
    }

    return $result;
}

function handleSimpleCases(int $number)
{
    if ($number == 2) {
        return true;
    }

    if ($number == 1 || $number % 2 == 0) {
        return false;
    }

    return true;
}
