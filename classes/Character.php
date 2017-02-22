<?php

abstract class Character {
    // Configuration du perso
    const type = 'Undefined Type';
    protected static $HP = 10;
    protected static $damages = 5;

    // Etat du perso
    public $name;
    protected $currentHP;

    public function __construct() {
        $this->name = static::type;
        $this->currentHP = static::$HP;
    }

    public static function getType() {
        return static::type;
    }

    public static function getHP() {
        return static::$HP;
    }

    public static function getDamages() {
        return static::$damages;
    }
}
