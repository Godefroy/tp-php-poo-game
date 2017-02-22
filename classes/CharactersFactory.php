<?php
namespace Game;
use Game\Characters;

class CharactersFactory {

    public static $types = [
        'archer' => Characters\Archer::class,
        'berzerk' => Characters\Berzerk::class,
        'knight' => Characters\Knight::class
    ];

    public static function create(string $type) {
        if (!isset(self::$types[$type])) {
            throw new \Exception('Unknown Character type ' . $type);
        }
        return new self::$types[$type]();
    }
}