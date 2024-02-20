<?php

namespace BrainGames\Games\BrainCalc;

use function cli\line;
use function cli\prompt;

function startBrainCalc()
{
    line("Welcome to the Brain Games!");
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line("What is the result of the expression?");

    checkUserInput($name);
}

function checkUserInput(string $name): void
{
    define("MINIMUM_RND_NUMBER", 0);
    define("MAXIMUM_RND_NUMBER", 10);
    $countCorrecctAnswers = 0;
    $operations = ["+", "-", "*"];

    while ($countCorrecctAnswers < 3) {
        $randomNumber1 = rand(MINIMUM_RND_NUMBER, MAXIMUM_RND_NUMBER);
        $randomNumber2 = rand(MINIMUM_RND_NUMBER, MAXIMUM_RND_NUMBER);
        $randomOperation = $operations[rand(0, (count($operations) - 1))];
        $result = null;

        if ($randomOperation === '+') {
            $result = $randomNumber1 + $randomNumber2;
        } elseif ($randomOperation === '-') {
            $result = $randomNumber1 - $randomNumber2;
        } elseif ($randomOperation === '*') {
            $result = $randomNumber1 * $randomNumber2;
        }

        line("Question: $randomNumber1 $randomOperation $randomNumber2");
        $answer = prompt("Your answer");

        if ($answer === "") {
            $countCorrecctAnswers = 0;
            line("Your answer can't be an empty string!");
        }

        if ((int)$answer === $result) {
            $countCorrecctAnswers++;
            line("Correct!");
        } else {
            $countCorrecctAnswers = 0;
            line("$answer is wrong answer ;(. Correct answer was $result.");
            line("Let's try again, %s!", $name);
            break;
        }
    }

    if ($countCorrecctAnswers === 3) {
        line("Congratulations, %s!", $name);
    }
}
