<?php

/**
 * Calculate the GCD game
 * PHP version 8.1.2-1ubuntu2.14
 *
 * @category BrainGcd
 * @package  BrainGcd
 * @author   lapaduga <deniskotov29042015@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/lapaduga
 */

namespace BrainGames\BrainGcd;

use function cli\line;
use function cli\prompt;

 /**
  * Start BrainGcd game 
  *
  * @return void
  **/
function startBrainGcd()
{
    line("Welcome to the Brain Games!\n");
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    line("Find the greatest common divisor of given numbers.\n");

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
    $countCorrecctAnswers = 0;
    
    while ($countCorrecctAnswers < 3) {
        $randomNumber1 = rand(0, 10);
        $randomNumber2 = rand(0, 10);
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

 /**
  * Finds the greatest common divisor 
  *
  * @param int $a first number
  * @param int $b second number
  *
  * @return int
  **/
function gcd($a,$b)
{
    if ($a === 0) {
        return $b;
    }
    
    if ($b === 0) {
        return $a;
    }

    if ($a === $b) {
        return $a ;
    }

    if ($a > $b) {
        return gcd($a-$b, $b);
    }

    return gcd($a, $b-$a);
}
