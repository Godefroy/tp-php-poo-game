<?php
namespace Game;

class Config {
    const battleFile = __DIR__ . '/../battle.txt';
    const nbCharacters = 2;
}

spl_autoload_register(function ($classname) {
    $classname = str_replace('Game\\', '', $classname);
    $classname = str_replace('\\', '/', $classname);
    require $classname . '.php';
});