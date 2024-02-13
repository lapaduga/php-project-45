<?php

/**
 * Calculate the numbers game
 * PHP version 8.1.2-1ubuntu2.14
 *
 * @category BrainCalc
 * @package  BrainCalc
 * @author   lapaduga <deniskotov29042015@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/lapaduga
 */

namespace BrainGames\BrainCalc;

use function cli\line;
use function cli\prompt;

 /**
  * Start BrainCalc game 
  *
  * @return void
  **/
function startBrainCalc()
{
    line("Welcome to the Brain Games!\n");
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    line("What is the result of the expression?.\n");

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
    $operations = ["+", "-", "*"];
    
    while ($countCorrecctAnswers < 3) {
        $randomNumber1 = rand(0, 100);
        $randomNumber2 = rand(0, 100);
        $randomOperation = $operations[rand(0, 2)];
        $result = null;

        if ($randomOperation === '+') {
            $result = $randomNumber1 + $randomNumber2;
        } elseif ($randomOperation === '-') {
            $result = $randomNumber1 - $randomNumber2;
        } elseif ($randomOperation === '*') {
            $result = $randomNumber1 * $randomNumber2;
        }

        $answer = prompt("Question: $randomNumber1 $randomOperation $randomNumber2");
        $answer = trim(strtolower($answer));
    
        if ($answer === "") {
            $countCorrecctAnswers = 0;
            line("Your answer can't be an empty string!");
        }

        line("Your answer: $answer");

        if ((int)$answer === $result) {
            $countCorrecctAnswers++;
            line("Correct!");
        } else {
            $countCorrecctAnswers = 0;
            line("$answer is wrong answer ;(. Correct answer was $result.");
        }
    }
    
    line("Congratulations, %s!", $name);
}
