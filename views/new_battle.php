<?php
use Game\Config;
use Game\CharactersFactory;

function showPlayerCharactersSelect($playerId) {
    for ($i = 0; $i < Config::nbCharacters; $i++) {
        echo '<select name="players_characters[' . $playerId . '][]" class="form-control">';
        foreach (CharactersFactory::$types as $type => $class) {
            echo '<option value="' . $type . '">' .
                "{$class::getType()} (HP: {$class::getHP()}, DMG: {$class::getDamages()})" .
                '</option>';
        }
        echo '</select>';
    }
}

?>

<div class="panel panel-primary">
    <div class="panel-heading">
        Nouvelle partie
    </div>
    <div class="panel-body">

        <form action="?controller=new_battle" method="post">
            <div class="form-group">
                <label>
                    Joueur 1 :
                    <input type="text" name="players_names[0]" placeholder="Nom du joueur" class="form-control" />
                    <?php showPlayerCharactersSelect(0); ?>
                </label>
            </div>
            <div class="form-group">
                <label>
                    Joueur 2 :
                    <input type="text" name="players_names[1]" placeholder="Nom du joueur" class="form-control" />
                    <?php showPlayerCharactersSelect(1); ?>
                </label>
            </div>
            <input type="submit" value="Commencer !" class="btn btn-primary"/>
        </form>

    </div>
</div>
