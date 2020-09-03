<?php

use Game\Game;
use Game\Goblin;

require_once 'vendor/autoload.php';

session_start();

if ($_SERVER['REQUEST_URI'] === '/run') {
    $game = new Game();
    $game->run();

    header('Content-Type: application/json; charset=UTF8');
    echo json_encode($game->getData());

    die ;
}

include 'index.phtml';
