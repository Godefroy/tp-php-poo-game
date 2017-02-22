<?php
use Game\Config;

// Surrender:
// Delete battle file and redirect to root path
if (file_exists(Config::battleFile)) {
    unlink(Config::battleFile);
}
header('Location: ./');
exit;
