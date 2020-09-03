<?php

use Game\Game;
use Game\Goblin;

require_once 'vendor/autoload.php';

session_start();

if (!isset($_SESSION['game'])) {
    $_SESSION['game'] = 1;
    /* echo 'Le jeu commence !'; */
} else {
    /* echo 'Le jeu a déjà commencé'; */
}

$game = new Game();
$game->run();
