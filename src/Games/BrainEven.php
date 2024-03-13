<?php

namespace BrainGames\Games\BrainEven;

use function BrainGames\Engine\startGame;

use const BrainGames\Engine\MINIMUM_RND_NUMBER;
use const BrainGames\Engine\MAXIMUM_RND_NUMBER;

function startBrainEvenGame()
{
    $question = 'Answer "yes" if the number is even, otherwise answer "no".';

    $callback = function () {
        $randomNumber = rand(MINIMUM_RND_NUMBER, MAXIMUM_RND_NUMBER);
        $isEven = isEven($randomNumber);

        return [
            "question" => "$randomNumber",
            "correctAnswer" => $isEven
        ];
    };

    startGame($callback, $question);
}

function isEven(int $number): string
{
    return $number % 2 === 0 ? "yes" : "no";
}
