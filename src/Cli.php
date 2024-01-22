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
  * Greets a player 
  *
  * @return void
  **/
function greet()
{
    line("Welcome to the Brain Games!\n");
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
}
