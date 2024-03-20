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

        return [
            'question' => (string)$number,
            'correctAnswer' => $result
        ];
    };

    startGame($callback, $description);
}

function isPrime(int $number): string
{
    $result = handleSimpleCases($number);

    $i = 3;
    $max_factor = (int)sqrt($number);

    while ($i <= $max_factor) {
        if ($number % $i === 0) {
            $result = 'no';
        }

        $i += 2;
    }

    return $result;
}

function handleSimpleCases(int $number): string
{
    if ($number === 2) {
        return 'yes';
    }

    if ($number === 1 || $number % 2 === 0) {
        return 'no';
    }

    return 'yes';
}
