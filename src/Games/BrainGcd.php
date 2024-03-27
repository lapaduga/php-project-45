<?php

namespace BrainGames\Games\BrainGcd;

use function BrainGames\Engine\startGame;

use const BrainGames\Engine\MINIMUM_RND_NUMBER;
use const BrainGames\Engine\MAXIMUM_RND_NUMBER;

function startBrainGcd()
{
    $description = 'Find the greatest common divisor of given numbers.';

    $callback = function () {
        $randomNumber1 = rand(MINIMUM_RND_NUMBER, MAXIMUM_RND_NUMBER);
        $randomNumber2 = rand(MINIMUM_RND_NUMBER, MAXIMUM_RND_NUMBER);
        $result = (string)gcd($randomNumber1, $randomNumber2);

        return [
            'question' => "{$randomNumber1} {$randomNumber2}",
            'correctAnswer' => $result
        ];
    };

    startGame($callback, $description);
}

function gcd(int $a, int $b): int
{
    if ($a === 0) {
        return $b;
    }

    if ($b === 0) {
        return $a;
    }

    if ($a > $b) {
        return gcd($a - $b, $b);
    }

    return gcd($a, $b - $a);
}
