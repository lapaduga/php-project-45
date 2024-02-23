<?php

namespace BrainGames\Games\BrainGcd;

use function cli\line;
use function cli\prompt;

define("MINIMUM_RND_NUMBER", 0);
define("MAXIMUM_RND_NUMBER", 10);

function startBrainGcd()
{
    line("Welcome to the Brain Games!\n");
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line("Find the greatest common divisor of given numbers.");

    checkUserInput($name);
}

function checkUserInput(string $name): void
{
    $countCorrectAnswers = 0;
    while ($countCorrectAnswers < 3) {
        $randomNumber1 = rand(MINIMUM_RND_NUMBER, MAXIMUM_RND_NUMBER);
        $randomNumber2 = rand(MINIMUM_RND_NUMBER, MAXIMUM_RND_NUMBER);
        $result = gcd($randomNumber1, $randomNumber2);
        line("Question: $randomNumber1 $randomNumber2");
        $answer = prompt("Your answer");
        if ($answer === "") {
            $countCorrectAnswers = 0;
            line("Your answer can't be an empty string!");
        }
        if ($answer == $result) {
            $countCorrectAnswers++;
            line("Correct!");
        } else {
            $countCorrectAnswers = 0;
            line("$answer is wrong answer ;(. Correct answer was $result.");
            line("Let's try again, %s!", $name);
            break;
        }
    }
    if ($countCorrectAnswers === 3) {
        line("Congratulations, %s!", $name);
    }
}

function gcd(int $a, int $b)
{
    return $b ? gcd($b, $a % $b) : $a;
}
