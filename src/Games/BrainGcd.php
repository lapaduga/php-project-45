<?php

namespace BrainGames\Games\BrainGcd;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\startGame;

function startBrainGcd()
{
    $question = "Find the greatest common divisor of given numbers.";

    $callback = function () {
        $randomNumber1 = rand(MINIMUM_RND_NUMBER, MAXIMUM_RND_NUMBER);
        $randomNumber2 = rand(MINIMUM_RND_NUMBER, MAXIMUM_RND_NUMBER);
        $result = gcd($randomNumber1, $randomNumber2);
        line("Question: $randomNumber1 $randomNumber2");
        $answer = prompt("Your answer");

        if ($answer == $result) {
                return true;
        } else {
                return [$answer, $result];
        }
    };

    startGame($callback, $question);
}

function gcd($a, $b)
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
