<?php

namespace BrainGames\Games\BrainProgression;

use function cli\line;
use function cli\prompt;

function startBrainProgression()
{
    line("Welcome to the Brain Games!");
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line("What number is missing in the progression?");

    checkUserInput($name);
}

function checkUserInput(string $name): void
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
    if ($countCorrectAnswers === 3) {
        line("Congratulations, %s!", $name);
    }
}
