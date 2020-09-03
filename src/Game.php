<?php

namespace Game;

use Game\Goblin;
use Game\Orc;
use Game\Witch;

class Game
{
    private $state;

    public function __construct()
    {
        if (!isset($_SESSION['game_state'])) {
            $this->state = [
                'turn' => 1,
                'personnages' => [
                ],
                'finished' => false,
            ];

            $nPersonnages = rand(5, 12);
            for ($i = 1; $i <= $nPersonnages; $i++) {
                $classe = rand(1, 3);

                switch ($classe) {
                    case 1:
                        $this->state['personnages'][] = new Goblin(uniqid());
                        break;
                    case 2:
                        $this->state['personnages'][] = new Witch(uniqid());
                        break;
                    case 3:
                        $this->state['personnages'][] = new Orc(uniqid());
                        break;
                }
            }
        } else {
            /* echo 'Le jeu a déjà commencé'; */
            $this->state = $_SESSION['game_state'];
        }
    }

    public function run()
    {
        foreach ($this->state['personnages'] as $key => $personnage) {
            if (!$personnage->isAlive()) {
                continue;
            }

            do {
                $targetId = rand(0, count($this->state['personnages']) - 1);
            } while ($targetId === $key);

            $target = $this->state['personnages'][$targetId];
            $personnage->play($target);

            if (!$target->isAlive()) {
                continue;
            }

            $targetState = $personnage->play($target);
        }

        /* var_dump($this->state); */
        $_SESSION['game_state'] = $this->state;
        if ($this->getNumberOfPersonnages() === 1) {
            $this->state['finished'] = true;
        }
    }

    public function getNumberOfPersonnages()
    {
        $count = 0;

        foreach ($this->state['personnages'] as $personnage) {
            if ($personnage->isAlive()) {
                $count++;
            }
        }

        return $count;
    }

    public function getData()
    {
        $data = [];

        foreach ($this->state['personnages'] as $personnage) {
            $data['personnages'][] = $personnage->getData();
        }

        return $data;
    }
}
