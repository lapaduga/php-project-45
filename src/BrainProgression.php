<?php

/**
 * Guess the missed number game
 * PHP version 8.1.2-1ubuntu2.14
 *
 * @category BrainProgression
 * @package  BrainProgression
 * @author   lapaduga <deniskotov29042015@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/lapaduga
 */

namespace BrainGames\BrainProgression;

use function cli\line;
use function cli\prompt;

 /**
  * Start BrainProgression game 
  *
  * @return void
  **/
function startBrainProgression()
{
    line("Welcome to the Brain Games!");
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line("What number is missing in the progression?");

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
            $countCorrecctAnswers++;
            line("Correct!");
        } else {
            $countCorrecctAnswers = 0;
            line("$guess is wrong answer ;(. Correct answer was $hiddenNumber.");
            line("Let's try again, %s!", $name);
            break;
        }
    }
    
    if ($countCorrecctAnswers === 3) {
        line("Congratulations, %s!", $name);
    }
}
