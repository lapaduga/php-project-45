<?php

namespace BrainGames\Games\BrainProgression;

use function BrainGames\Engine\startGame;

const PROGRESSION_LENGTH = 10;
const MIN_PROGRESSION_RANDOM_NUMBER = 0;
const MAX_PROGRESSION_RANDOM_NUMBER = 100;
const MINIMUM_STEP_NUMBER = 2;
const MAXIMUM_STEP_NUMBER = 6;

function startBrainProgression()
{
    $description = 'What number is missing in the progression?';

    $callback = function () {
        $data = createProgression();

        return [
            'question' => $data["question"],
            'correctAnswer' => (string)$data["answer"]
        ];
    };

    startGame($callback, $description);
}

function createProgression()
{
    $arrayLength = PROGRESSION_LENGTH;
    $hiddenPosition = rand(MIN_PROGRESSION_RANDOM_NUMBER, $arrayLength - 1);
    $step = rand(MINIMUM_STEP_NUMBER, MAXIMUM_STEP_NUMBER);
    $startFrom = rand(MIN_PROGRESSION_RANDOM_NUMBER, MAX_PROGRESSION_RANDOM_NUMBER);
    $finishAt = $startFrom + MAX_PROGRESSION_RANDOM_NUMBER;
    $array = range($startFrom, $finishAt, $step);

    $hiddenNumber = $array[$hiddenPosition];
    $array[$hiddenPosition] = '..';
    $stringArray = implode(' ', $array);

    return [
        'question' => $stringArray,
        'answer' => $hiddenNumber
    ];
}
