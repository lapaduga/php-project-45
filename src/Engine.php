<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const COUNT_CORRECT_ANSWERS = 3;
const MINIMUM_RND_NUMBER = 0;
const MAXIMUM_RND_NUMBER = 10;

function startGame(callable $cb, string $question): void
{
    $name = greet($question);

    $countCorrectAnswers = 0;

    for ($i = 0; $i < COUNT_CORRECT_ANSWERS; $i++) {
        $data = $cb();
        $gameQuestion = $data["question"];
        $correctAnswer = $data["correctAnswer"];

        line("Question: $gameQuestion");
        $answer = prompt("Your answer");

        $data["result"] = handleResult($answer, $correctAnswer);

        if ($data["result"] === true) {
            $countCorrectAnswers++;
            line("Correct!");
        } else {
            line("\"$answer\" is wrong answer ;(. Correct answer was \"$correctAnswer\".");
            line("Let's try again, %s!", $name);
            break;
        }
    }

    congratulate($countCorrectAnswers, $name);
}

function handleResult(string $answer, string | int $correctAnswer)
{
    if ($answer == $correctAnswer) {
        return true;
    } else {
        return [$answer, $correctAnswer];
    }
}

function greet(string $question): string
{
    line("Welcome to the Brain Games!");
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($question);

    return $name;
}

function congratulate(int $countCorrectAnswers, string $name): void
{
    if ($countCorrectAnswers === 3) {
        line("Congratulations, %s!", $name);
    }
}
