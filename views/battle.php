<?php

function showPlayer($battle, $playerId) {
    $player = $battle->getPlayer($playerId);

    echo '<h4>' . $player->getName() . ' :</h4>';

    foreach ($player->getCharacters() as $i => $character) {
        echo '<div>
            <label>
                <input type="radio" name="player' . $playerId . '_character" value="' . $i . '"/>
                ' . $character->name . '<br />
                ' . nl2br($character->status()) . '
            </label>
        </div>';
    }
}

?>
<form action="?controller=battle" method="post">
    <input type="hidden" name="turn" value="<?php echo $battle->getTurn(); ?>" />
    <div class="panel panel-primary">
        <div class="panel-heading">
            Combat
        </div>
        <div class="panel-body">

            <form action="?controller=battle" method="post">
                <div class="col-md-4">
                    <?php echo showPlayer($battle, 0); ?>
                </div>

                <div class="col-md-4">
                    <button name="attack" class="btn btn-primary">
                        <?php
                        if ($battle->getTurn() % 2 == 1) echo '<'
                        ?>
                        Attaquer
                        <?php
                        if ($battle->getTurn() % 2 == 0) echo '>'
                        ?>
                    </button>
                </div>

                <div class="col-md-4">
                    <?php echo showPlayer($battle, 1); ?>
                </div>
            </form>

        </div>
    </div>

</form>
