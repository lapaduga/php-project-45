<?php

namespace BrainGames\Games\BrainEven;

use function cli\line;
use function cli\prompt;

function startBrainEvenGame()
{
    line("Welcome to the Brain Games!");
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line("Answer \"yes\" if the number is even, otherwise answer \"no\".");

    checkUserInput($name);
}

function checkUserInput(string $name): void
{
    define("MINIMUM_RND_NUMBER", 0);
    define("MAXIMUM_RND_NUMBER", 100);
    $countCorrecctAnswers = 0;
    while ($countCorrecctAnswers < 3) {
        $randomNumber = rand(MINIMUM_RND_NUMBER, MAXIMUM_RND_NUMBER);
        line("Question: $randomNumber");
        $answer = prompt("Your answer");
        if ($answer !== "yes" && $answer !== "no") {
            $countCorrecctAnswers = 0;
            line("Your answer can be only 'yes' or 'no' in any case!");
        }
        $isEven = $randomNumber % 2 === 0;
        if ($isEven) {
            if ($answer === "yes") {
                $countCorrecctAnswers++;
                line('Correct!');
            } else {
                $countCorrecctAnswers = 0;
                line("'no' is wrong answer ;(. Correct answer was 'yes'.");
                line("Let's try again, %s!", $name);
                break;
            }
        } else {
            if ($answer === "no") {
                $countCorrecctAnswers++;
                line('Correct!');
            } else {
                $countCorrecctAnswers = 0;
                line("'yes' is wrong answer ;(. Correct answer was 'no'.");
                line("Let's try again, %s!", $name);
                break;
            }
        }
    }
    if ($countCorrecctAnswers === 3) {
        line("Congratulations, %s!", $name);
    }
}
