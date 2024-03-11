<?php

namespace BrainGames\Games\BrainEven;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\startGame;

use const BrainGames\Engine\MINIMUM_RND_NUMBER;
use const BrainGames\Engine\MAXIMUM_RND_NUMBER;

function startBrainEvenGame()
{
    $question = 'Answer "yes" if the number is even, otherwise answer "no".';

    $callback = function () {
        $randomNumber = rand(MINIMUM_RND_NUMBER, MAXIMUM_RND_NUMBER);
        line("Question: $randomNumber");
        $answer = prompt("Your answer");

        $isEven = isEven($randomNumber);

        return handleData($isEven, $answer);
    };

    startGame($callback, $question);
}

function handleData(bool $isEven, string $answer): bool | array
{
    if ($isEven && $answer === "yes") {
        return true;
    }

    if ($isEven && $answer === "no") {
        return [$answer, "yes"];
    }

    if (!$isEven && $answer === "no") {
        return true;
    }

    if (!$isEven && $answer === "yes") {
        return [$answer, "no"];
    }
}

function isEven(int $number): bool
{
    return $number % 2 === 0;
}
