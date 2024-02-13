<?php

/**
 * Starting a game
 * PHP version 8.1.2-1ubuntu2.14
 *
 * @category StartGame
 * @package  StartGame
 * @author   lapaduga <deniskotov29042015@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/lapaduga
 */

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

 /**
  * Start BrainCalc game 
  *
  * @param string   $string   Specific text for a specific game
  * @param callable $callback Specific callback for a specific game
  *
  * @return void
  **/
function startGame($string, $callback)
{
    line("Welcome to the Brain Games!\n");
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    line("$string\n");

    $callback($name);
}
