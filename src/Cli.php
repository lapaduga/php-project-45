<?php

/**
 * Interaction with cli
 * PHP version 8.1.2-1ubuntu2.14
 *
 * @category Cli
 * @package  Cli
 * @author   lapaduga <deniskotov29042015@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/lapaduga
 */

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

function greet()
{
    line("Welcome to the Brain Games!");
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
}
