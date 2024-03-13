<?php

namespace BrainGames\Games\BrainProgression;

use function BrainGames\Engine\startGame;

function startBrainProgression()
{
    $question = "What number is missing in the progression?";

    $callback = function () {
        $data = createProgression();

        return [
            "question" => $data["question"],
            "correctAnswer" => $data["answer"]
        ];
    };

    startGame($callback, $question);
}

function createProgression()
{
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

    return [
        "question" => $stringArray,
        "answer" => $hiddenNumber
    ];
}
