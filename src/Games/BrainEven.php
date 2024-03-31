<?php

namespace BrainGames\Games\BrainEven;

use function BrainGames\Engine\startGame;

use const BrainGames\Engine\MINIMUM_RND_NUMBER;
use const BrainGames\Engine\MAXIMUM_RND_NUMBER;

function startBrainEvenGame()
{
    $description = 'Answer "yes" if the number is even, otherwise answer "no".';

    $callback = function () {
        $number = rand(MINIMUM_RND_NUMBER, MAXIMUM_RND_NUMBER);
        $result = isEven($number);

        $correctAnswer = defineCorrectAnswer($result);

        return [
            'question' => (string)$number,
            'correctAnswer' => $correctAnswer
        ];
    };

    startGame($callback, $description);
}

function isEven(int $number): bool
{
    return $number % 2 === 0;
}

function defineCorrectAnswer(bool $result): string
{
    return $result === true ? 'yes' : 'no';
}
