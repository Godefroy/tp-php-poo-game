<?php
namespace Game;

class Battle {
    private $player1;
    private $player2;
    private $turn = 0;

    public function __construct(Player $player1, Player $player2) {
        $this->player1 = $player1;
        $this->player2 = $player2;
    }

    // Get Battle from file
    public static function retrieve(string $filename) {
        if (file_exists($filename) && $content = file_get_contents($filename)) {
            return unserialize($content);
        }
        return false;
    }

    // Save Battle to file
    public function save(string $filename) {
        file_put_contents($filename, serialize($this));
    }

    public function getPlayer(int $i) {
        if ($i == 0) return $this->player1;
        if ($i == 1) return $this->player2;
    }

    public function getCurrentPlayer() {
        return $this->getPlayer($this->turn % 2);
    }

    public function getNextPlayer() {
        return $this->getPlayer(1 - $this->turn % 2);
    }

    public function nextTurn() {
        $this->turn++;
    }

    public function getTurn() {
        return $this->turn;
    }
}
