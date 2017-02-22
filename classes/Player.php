<?php

class Player {
    private $characters;

    public function _construct($characters = []) {
        $this->characters = $characters;
    }

    public function addCharacter($character) {
        $this->characters[] = $character;
    }

    public function removeCharacter($character) {
        $i = array_search($character, $this->characters, true);
        if ($i !== false) {
            array_splice($this->characters, $i, 1);
        }
    }

    public function getCharacters() {
        return $this->characters;
    }
}
