<?php

class CharactersFactory {

    public static $types = [
        'archer' => ArcherCharacter::class,
        'berzerk' => BerzerkCharacter::class,
        'knight' => KnightCharacter::class
    ];

    public static function create($type) {
        if (!isset(self::$types[$type])) {
            throw new Exception('Unknown Character type ' . $type);
        }
        return new self::$types[$type]();
    }
}