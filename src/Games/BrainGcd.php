<?php

namespace BrainGames\Games\BrainGcd;

use function cli\line;
use function cli\prompt;

function startBrainGcd()
{
    line("Welcome to the Brain Games!\n");
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line("Find the greatest common divisor of given numbers.");

    checkUserInput($name);
}

 /**
  * Check if user input defines number properly
  *
  * @param string $name user name
  *
  * @return void
  **/
function checkUserInput(string $name): void
{
    define("MINIMUM_RND_NUMBER", 0);
    define("MAXIMUM_RND_NUMBER", 10);
    $countCorrecctAnswers = 0;
    while ($countCorrecctAnswers < 3) {
        $randomNumber1 = rand(MINIMUM_RND_NUMBER, MAXIMUM_RND_NUMBER);
        $randomNumber2 = rand(MINIMUM_RND_NUMBER, MAXIMUM_RND_NUMBER);
        $result = gcd($randomNumber1, $randomNumber2);
        line("Question: $randomNumber1 $randomNumber2");
        $answer = prompt("Your answer");
        if ($answer === "") {
            $countCorrecctAnswers = 0;
            line("Your answer can't be an empty string!");
        }
        if ($answer == $result) {
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

function gcd($a, $b)
{
    if ($a === 0) {
        return $b;
    }
    if ($b === 0) {
        return $a;
    }
    if ($a === $b) {
        return $a;
    }
    if ($a > $b) {
        return gcd($a - $b, $b);
    }
    return gcd($a, $b - $a);
}
