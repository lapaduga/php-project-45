<?php

namespace BrainGames\Games\BrainProgression;

use function BrainGames\Engine\startGame;

const ARRAY_LENGTH = 10;
const ZERO = 0;
const MAX_RANDOM_NUMBER = 100;
const MINIMUM_STEP_NUMBER = 2;
const MAXIMUM_STEP_NUMBER = 6;

function startBrainProgression()
{
    $description = 'What number is missing in the progression?';

    $callback = function () {
        $data = createProgression();

        return [
            'question' => $data["question"],
            'correctAnswer' => $data["answer"]
        ];
    };

    startGame($callback, $description);
}

function createProgression()
{
    $arrayLength = ARRAY_LENGTH;
    $hiddenPosition = rand(ZERO, $arrayLength - 1);
    $step = rand(MINIMUM_STEP_NUMBER, MAXIMUM_STEP_NUMBER);
    $startFrom = rand(ZERO, MAX_RANDOM_NUMBER);
    $finishAt = $startFrom + MAX_RANDOM_NUMBER;
    $array = range($startFrom, $finishAt, $step);

    $hiddenNumber = $array[$hiddenPosition];
    $array[$hiddenPosition] = '..';
    $stringArray = implode(' ', $array);

    return [
        'question' => $stringArray,
        'answer' => $hiddenNumber
    ];
}
