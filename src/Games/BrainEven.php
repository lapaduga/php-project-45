<?php

namespace BrainGames\Games\BrainEven;

use function BrainGames\Engine\startGame;

use const BrainGames\Engine\MINIMUM_RND_NUMBER;
use const BrainGames\Engine\MAXIMUM_RND_NUMBER;

function startBrainEvenGame()
{
    $description = 'Answer "yes" if the number is even, otherwise answer "no".';

    $callback = function () {
        $randomNumber = rand(MINIMUM_RND_NUMBER, MAXIMUM_RND_NUMBER);
        $correctAnswer = getIsEvenAnswer($randomNumber);

        return [
            'question' => (string)$randomNumber,
            'correctAnswer' => $correctAnswer
        ];
    };

    startGame($callback, $description);
}

function getIsEvenAnswer(int $number): string
{
    return $number % 2 === 0 ? 'yes' : 'no';
}
