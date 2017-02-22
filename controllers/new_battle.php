<?php

// New Battle
if (isset($_POST['players_characters'])) {
    try {
        $players_characters = $_POST['players_characters'];
        $players = [];

        if (!is_array($_POST['players_characters']) || count($_POST['players_characters']) != 2) {
            throw new Exception();
        }

        // Pour chaque joueur
        for ($playerId = 0; $playerId < count($players_characters); $playerId++) {
            if (!is_array($players_characters[$playerId])) {
                throw new Exception();
            }
            $player = new Player();
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
