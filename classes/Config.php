<?php

class Config {
    const battleFile = 'battle.txt';
    const nbCharacters = 2;
}

function __autoload($classname) {
    if (preg_match('#.+Character$#', $classname)) {
        include 'Characters/' . $classname . '.php';
    } else {
        include $classname . '.php';
    }
}
