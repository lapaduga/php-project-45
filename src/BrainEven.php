<?php

/**
 * Guess if the number is even game
 * PHP version 8.1.2-1ubuntu2.14
 *
 * @category BrainEven
 * @package  BrainEven
 * @author   lapaduga <deniskotov29042015@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/lapaduga
 */

namespace BrainGames\BrainEven;

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
    $countCorrecctAnswers = 0;
    while ($countCorrecctAnswers < 3) {
        $randomNumber = rand(0, 100);
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
