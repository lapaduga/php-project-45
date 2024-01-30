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

$autoloadPath1 = __DIR__ . '/../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../vendor/autoload.php';

if (file_exists($autoloadPath1)) {
    include_once $autoloadPath1;
} else {
    include_once $autoloadPath2;
}

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
