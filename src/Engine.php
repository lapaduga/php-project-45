<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const COUNT_CORRECT_ANSWERS = 3;
const MINIMUM_RND_NUMBER = 0;
const MAXIMUM_RND_NUMBER = 10;

function startGame(callable $cb, string $question): void
{
    line("Welcome to the Brain Games!");
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($question);

    $countCorrectAnswers = 0;

    for ($i = 0; $i < COUNT_CORRECT_ANSWERS; $i++) {
        $result = $cb();

        if ($result === true) {
                $countCorrectAnswers++;
                line("Correct!");
        } else {
                line("\"$result[0]\" is wrong answer ;(. Correct answer was \"$result[1]\".");
                line("Let's try again, %s!", $name);
                break;
        }
    }

    if ($countCorrectAnswers === 3) {
            line("Congratulations, %s!", $name);
    }
}
