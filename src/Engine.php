<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const COUNT_CORRECT_ANSWERS = 3;
const MINIMUM_RND_NUMBER = 0;
const MAXIMUM_RND_NUMBER = 10;

$callback = function () {
    line("Start callback");
    line(MINIMUM_RND_NUMBER);
    line(MAXIMUM_RND_NUMBER);
}

function startGame($string, $cb)
{
    line("Welcome to the Brain Games!");
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($string);
 
    $cb($name, MINIMUM_RND_NUMBER, MAXIMUM_RND_NUMBER);
}

startGame("StartGame function started", $callback);