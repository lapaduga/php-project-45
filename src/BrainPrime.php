<?php

/**
 * Guess the prime number game
 * PHP version 8.1.2-1ubuntu2.14
 *
 * @category BrainPrime
 * @package  BrainPrime
 * @author   lapaduga <deniskotov29042015@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/lapaduga
 */

namespace BrainGames\BrainPrime;

use function cli\line;
use function cli\prompt;

 /**
  * Start BrainPrime game 
  *
  * @return void
  **/
function startBrainPrime()
{
    line("Welcome to the Brain Games!\n");
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    line("Answer 'yes' if given number is prime. Otherwise answer 'no'.\n");

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
        $number = rand(0, 100);
        $result = isPrime($number);

        $guess = prompt("Question: $number");
        $guess = trim(strtolower($guess));

        line("Your answer: $guess");

        if ($result === true) {
            if ($guess === "yes") {
                $countCorrecctAnswers++;
                line("Correct!");
            } else {
                $countCorrecctAnswers = 0;
                line("'no' is wrong answer ;(. Correct answer was 'yes'.");
            }
        } else {
            if ($guess === "no") {
                $countCorrecctAnswers++;
                line("Correct!");
            } else {
                $countCorrecctAnswers = 0;
                line("'yes' is wrong answer ;(. Correct answer was 'no'.");
            }
        }
    }
    
    line("Congratulations, %s!", $name);
}

 /**
  * Checks if number is prime
  *
  * @param int $number number to check
  *
  * @return bool
  **/
function isPrime($number)
{
    if ($number==2) {
        return true;
    }

    if ($number%2==0) {
        return false;
    }

    $i=3;
    $max_factor = (int)sqrt($number);

    while ($i<=$max_factor) {
        if ($number%$i == 0) {
            return false;
        }

        $i+=2;
    }

    return true;
}
