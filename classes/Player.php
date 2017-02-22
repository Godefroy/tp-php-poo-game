<?php
namespace Game;
use Game\Characters\Character;

class Player {
    private $name;
    private $characters;

    public function __construct(string $name = 'Player') {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    public function addCharacter(Character $character) {
        $this->characters[] = $character;
    }

    public function removeCharacter(Character $character) {
        $i = array_search($character, $this->characters, true);
        if ($i !== false) {
            array_splice($this->characters, $i, 1);
        }
    }

    public function getCharacters() {
        return $this->characters;
    }

    public function getCharacter(int $i) {
        if (!isset($this->characters[$i])) {
            throw new \Exception('Character n°' . $i . ' doesn\'t exist in Player');
        }
        return $this->characters[$i];
    }
}
