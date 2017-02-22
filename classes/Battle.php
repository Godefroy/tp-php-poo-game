<?php

class Battle {
    private $player1;
    private $player2;

    public function __construct($player1, $player2) {
        $this->player1 = $player1;
        $this->player2 = $player2;
    }

    // Get Battle from file
    public static function retrieve($filename) {
        if (file_exists($filename) && $content = file_get_contents($filename)) {
            return unserialize($content);
        }
        return false;
    }

    // Save Battle to file
    public function save($filename) {
        file_put_contents($filename, serialize($this));
    }

    public function getPlayer1() {
        return $this->player1;
    }

    public function getPlayer2() {
        return $this->player2;
    }
}
