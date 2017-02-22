<?php
namespace Game\Characters;

abstract class Character {
    // Configuration du perso
    const type = 'Undefined Type';
    protected static $HP = 10;
    protected static $damages = 5;

    // Etat du perso
    public $name;
    protected $currentHP;

    public function __construct(string $name = null) {
        $this->name = $name === null ? static::type : $name;
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

    public function getCurrentHP() {
        return $this->currentHP;
    }

    public function attack(Character $character) {
        $character->currentHP = max($character->currentHP - static::$damages, 0);
    }

    public function status() {
        if ($this->currentHP == 0) {
            return 'Dead';
        }
        return 'HP: ' . $this->currentHP . ' / ' . static::$HP . "\n" .
            'DMG: ' . static::$damages;
    }
}
