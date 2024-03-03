<?php

namespace BrainGames\Games\BrainProgression;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\startGame;

function startBrainProgression()
{
    $question = "What number is missing in the progression?";

    $callback = function () {
        $arrayLength = 10;
        $hiddenPosition = rand(0, $arrayLength - 1);
        $step = rand(2, 6);
        $startFrom = rand(0, 100);
        $array = [$startFrom];
        for ($i = 0; $i < $arrayLength; $i++) {
                $array[] = $array[$i] + $step;
        }
        $hiddenNumber = $array[$hiddenPosition];
        $array[$hiddenPosition] = "..";
        $stringArray = implode(' ', $array);
        line("Question: $stringArray");
        $guess = prompt("Your answer");

        if ($guess == $hiddenNumber) {
                return true;
        } else {
                return [$guess, $hiddenNumber];
        }
    };

    startGame($callback, $question);
}

/* function checkUserInput(string $name): void
{
    $countCorrectAnswers = 0;
    while ($countCorrectAnswers < 3) {
        $arrayLength = 10;
        $hiddenPosition = rand(0, $arrayLength - 1);
        $step = rand(2, 6);
        $startFrom = rand(0, 100);
        $array = [$startFrom];
        for ($i = 0; $i < $arrayLength; $i++) {
            $array[] = $array[$i] + $step;
        }
        $hiddenNumber = $array[$hiddenPosition];
        $array[$hiddenPosition] = "..";
        $stringArray = implode(' ', $array);
        line("Question: $stringArray");
        $guess = prompt("Your answer");
        if ($guess == $hiddenNumber) {
            $countCorrectAnswers++;
            line("Correct!");
        } else {
            $countCorrectAnswers = 0;
            line("$guess is wrong answer ;(. Correct answer was $hiddenNumber.");
            line("Let's try again, %s!", $name);
            break;
        }
    }
}
 */