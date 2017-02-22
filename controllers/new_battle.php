<?php
use Game\Battle as Battle;
use Game\Player as Player;
use Game\CharactersFactory as CharactersFactory;

// New Battle
if (isset($_POST['players_characters']) && isset($_POST['players_names'])) {
    try {
        $players_characters = $_POST['players_characters'];
        $players_names = $_POST['players_names'];
        $players = [];

        if (!is_array($players_characters) || count($players_characters) != 2) {
            throw new Exception();
        }

        if (!is_array($players_names) || count($players_names) != 2) {
            throw new Exception();
        }

        // Pour chaque joueur
        for ($playerId = 0; $playerId < count($players_characters); $playerId++) {
            if (!is_array($players_characters[$playerId])) {
                throw new Exception();
            }

            $name = preg_replace('#[^a-z0-9_-]+#i', ' ', trim($players_names[$playerId]));
            if (strlen($name) < 3) {
                throw new Exception('Name must be at least 3 chars long.');
            }

            $player = new Player($name);
            $players[] = $player;

            // On ajoute chaque perso sélectionné
            foreach ($players_characters[$playerId] as $character_type) {
                $character = CharactersFactory::create($character_type);
                $player->addCharacter($character);
            }
        }

        $battle = new Battle($players[0], $players[1]);
        $view = 'battle';

    } catch (Exception $e) {
        $error = true;
    }
}
