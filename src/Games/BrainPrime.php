<?php

namespace BrainGames\Games\BrainPrime;

use function BrainGames\Engine\startGame;

use const BrainGames\Engine\MINIMUM_RND_NUMBER;
use const BrainGames\Engine\MAXIMUM_RND_NUMBER;

function startBrainPrime()
{
    $description = 'Answer "yes" if given number is prime. Otherwise answer "no".';

    $callback = function () {
        $number = rand(MINIMUM_RND_NUMBER, MAXIMUM_RND_NUMBER);
        $result = isPrime($number);

        if ($result) {
            $correctAnswer = 'yes';
        } else {
            $correctAnswer = 'no';
        }

        return [
            'question' => (string)$number,
            'correctAnswer' => $correctAnswer
        ];
    };

    startGame($callback, $description);
}

function isPrime(int $number): string
{
    $result = handleSimpleCases($number);
    $maxFactor = (int)sqrt($number);

    for ($i = 3; $i <= $maxFactor; $i += 2) {
        if ($number % $i === 0) {
            $result = false;
        }
    }

    return $result;
}

function handleSimpleCases(int $number): string
{
    if ($number === 2) {
        return true;
    }

    if ($number === 1 || $number % 2 === 0) {
        return false;
    }

    return true;
}
