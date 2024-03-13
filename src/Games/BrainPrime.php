<?php

namespace BrainGames\Games\BrainPrime;

use function BrainGames\Engine\startGame;

use const BrainGames\Engine\MINIMUM_RND_NUMBER;
use const BrainGames\Engine\MAXIMUM_RND_NUMBER;

function startBrainPrime()
{
    $question = 'Answer "yes" if given number is prime. Otherwise answer "no".';

    $callback = function () {
        $number = rand(MINIMUM_RND_NUMBER, MAXIMUM_RND_NUMBER);
        $result = isPrime($number);

        return [
            "question" => "$number",
            "correctAnswer" => $result
        ];
    };

    startGame($callback, $question);
}

function isPrime(int $number): string
{
    $result = "yes";

    $result = handleSimpleCases($number);

    $i = 3;
    $max_factor = (int)sqrt($number);

    while ($i <= $max_factor) {
        if ($number % $i == 0) {
            $result = "no";
        }

        $i += 2;
    }

    return $result;
}

function handleSimpleCases(int $number): string
{
    if ($number == 2) {
        return "yes";
    }

    if ($number == 1 || $number % 2 == 0) {
        return "no";
    }

    return "yes";
}
