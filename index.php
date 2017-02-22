<?php
require 'classes/Config.php';
use Game\Config;
use Game\Battle;

// Try to retrieve saved Battle
$battle = Battle::retrieve(Config::battleFile);

// Default view
$view = $battle === false ? 'new_battle' : 'battle';
$error = false;

// Contrôleurs
if (isset($_GET['controller']) && preg_match('#^[a-z_]+$#', $_GET['controller']) &&
    file_exists('controllers/' . $_GET['controller'] . '.php')
) {
    require 'controllers/' . $_GET['controller'] . '.php';
}

// Save Battle if it exists
if ($battle) {
    $battle->save(Config::battleFile);
}

?>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>


<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>Mini RPG</h1>

            <?php if ($error) { ?>
                <div class="alert alert-danger" role="alert">
                    Une erreur s'est produite !
                </div>
            <?php } ?>

            <?php
            require 'views/' . $view . '.php';
            ?>

        </div>
    </div>
</div>


</body>
</html>