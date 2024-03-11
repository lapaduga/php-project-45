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
        $isEven = $randomNumber % 2 === 0;

        if ($isEven) {
            if ($answer === "yes") {
                return true;
            } else {
                return [$answer, "yes"];
            }
        } else {
            if ($answer === "no") {
                return true;
            } else {
                return [$answer, "no"];
            }
        }
    };

    startGame($callback, $question);
}
