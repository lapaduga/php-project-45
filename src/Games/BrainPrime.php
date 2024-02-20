<?php

namespace BrainGames\Games\BrainPrime;

use function cli\line;
use function cli\prompt;

function startBrainPrime()
{
    line("Welcome to the Brain Games!");
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line("Answer \"yes\" if given number is prime. Otherwise answer \"no\".");

    checkUserInput($name);
}

function checkUserInput(string $name): void
{
    define("MINIMUM_RND_NUMBER", 0);
    define("MAXIMUM_RND_NUMBER", 10);
    $countCorrecctAnswers = 0;
    while ($countCorrecctAnswers < 3) {
        $number = rand(MINIMUM_RND_NUMBER, MAXIMUM_RND_NUMBER);
        $result = isPrime($number);

        line("Question: $number");
        $guess = prompt("Your answer");

        if ($result === true) {
            if ($guess === "yes") {
                $countCorrecctAnswers++;
                line("Correct!");
            } else {
                $countCorrecctAnswers = 0;
                line("'no' is wrong answer ;(. Correct answer was 'yes'.");
                line("Let's try again, %s!", $name);
                break;
            }
        } else {
            if ($guess === "no") {
                $countCorrecctAnswers++;
                line("Correct!");
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

function isPrime($number)
{
    if ($number == 2) {
        return true;
    }

    if ($number == 1) {
        return false;
    }

    if ($number % 2 == 0) {
        return false;
    }

    $i = 3;
    $max_factor = (int)sqrt($number);

    while ($i <= $max_factor) {
        if ($number % $i == 0) {
            return false;
        }

        $i += 2;
    }

    return true;
}
