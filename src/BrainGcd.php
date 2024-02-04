<?php

/**
 * Calculate the numbers game
 * PHP version 8.1.2-1ubuntu2.14
 *
 * @category BrainGcd
 * @package  BrainGcd
 * @author   lapaduga <deniskotov29042015@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/lapaduga
 */

namespace BrainGames\BrainGcd;

$autoloadPath1 = __DIR__ . '/../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../vendor/autoload.php';

if (file_exists($autoloadPath1)) {
    include_once $autoloadPath1;
} else {
    include_once $autoloadPath2;
}

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
        $randomNumber1 = rand(0, 100);
        $randomNumber2 = rand(0, 100);
        $result = gcd($randomNumber1, $randomNumber2);

        $answer = prompt("Question: $randomNumber1 $randomNumber2");
        $answer = trim(strtolower($answer));
    
        if ($answer === "") {
            $countCorrecctAnswers = 0;
            line("Your answer can't be an empty string!");
        }

        line("Your answer: $answer");

        if ($answer == $result) {
            $countCorrecctAnswers++;
            line("Correct!");
        } else {
            $countCorrecctAnswers = 0;
            line("$answer is wrong answer ;(. Correct answer was $result.");
        }
    }
    
    line("Congratulations, %s!", $name);
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
