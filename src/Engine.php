<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

define("COUNT_CORRECT_ANSWERS", 3);
define("MINIMUM_RND_NUMBER", 0);
define("MAXIMUM_RND_NUMBER", 10);

function startGame($cb, $question)
{
    line("Welcome to the Brain Games!");
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($question);

    $countCorrectAnswers = 0;

    while ($countCorrectAnswers < COUNT_CORRECT_ANSWERS) {
        $result = $cb();

        if ($result === true) {
            $countCorrectAnswers++;
            line("Correct!");
        } else {
            $countCorrectAnswers = 0;
            line("\"$result[0]\" is wrong answer ;(. Correct answer was \"$result[1]\".");
            line("Let's try again, %s!", $name);
            break;
        }
    }

    if ($countCorrectAnswers === 3) {
        line("Congratulations, %s!", $name);
    }
}
