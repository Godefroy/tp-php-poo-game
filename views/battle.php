<form action="?controller=battle" method="post">
    <div class="panel panel-primary">
        <div class="panel-heading">
            Combat
        </div>
        <div class="panel-body">

            <form action="?controller=battle" method="post">
                <div class="col-md-4">
                    <h4>Joueur 1 :</h4>
                    <?php foreach ($battle->getPlayer1()->getCharacters() as $i => $character) { ?>
                        <div>
                            <label>
                                <input type="radio" name="player1_character" value="<?php echo $i; ?>"/>
                                <?php echo $character->name; ?>
                            </label>
                        </div>
                    <?php } ?>
                </div>

                <div class="col-md-4">
                    <input type="submit" name="attack" value="Attaquer" class="btn btn-primary"/>
                </div>

                <div class="col-md-4">
                    <h4>Joueur 2 :</h4>
                    <?php foreach ($battle->getPlayer2()->getCharacters() as $i => $character) { ?>
                        <div>
                            <label>
                                <input type="radio" name="player2_character" value="<?php echo $i; ?>"/>
                                <?php echo $character->name; ?>
                            </label>
                        </div>
                    <?php } ?>
                </div>
            </form>

        </div>
    </div>

</form>
