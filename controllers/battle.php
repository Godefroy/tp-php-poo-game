<?php
if (!$battle) return;

// On vérifie que l'envoi du formulaire correspond au bon tour de jeu
if (isset($_POST['turn']) && (int)$_POST['turn'] !== $battle->getTurn()) {
    $error = true;
    return; // On va directement à la fin de ce fichier
}

// Attaque
if (isset($_POST['attack']) && isset($_POST['player0_character']) && isset($_POST['player1_character'])) {
    try {
        $player_turn = $battle->getTurn() % 2;
        $attacker_index = (int)$_POST['player' . $player_turn . '_character'];
        $defender_index = (int)$_POST['player' . (1 - $player_turn) . '_character'];

        $attacker = $battle->getCurrentPlayer()->getCharacter($attacker_index);
        $defender = $battle->getNextPlayer()->getCharacter($defender_index);

        $attacker->attack($defender);
        $battle->nextTurn();

    } catch (Exception $e) {
        $error = true;
    }
}
