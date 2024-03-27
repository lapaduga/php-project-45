<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const COUNT_CORRECT_ANSWERS = 3;
const MINIMUM_RND_NUMBER = 0;
const MAXIMUM_RND_NUMBER = 10;

function startGame(callable $cb, string $description): void
{
    $name = handleGameStart($description);

    $countCorrectAnswers = 0;

    for ($i = 0; $i < COUNT_CORRECT_ANSWERS; $i++) {
        $data = $cb();
        $gameQuestion = $data['question'];
        $correctAnswer = $data['correctAnswer'];

        line("Question: $gameQuestion");
        $answer = prompt('Your answer');

        if ($answer === $correctAnswer) {
            $countCorrectAnswers++;
            line('Correct!');
        } else {
            line("\"$answer\" is wrong answer ;(. Correct answer was \"$correctAnswer\".");
            line("Let's try again, %s!", $name);
            return;
        }
    }

    line('Congratulations, %s!', $name);
}

function handleGameStart(string $description): string
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line('Hello, %s!', $name);
    line($description);

    return $name;
}
