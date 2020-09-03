<?php

namespace Game;

class Goblin extends Personnage
{
    public function play(Personnage $target)
    {
        $this->resolvePoison();

        $action = rand(1, 2);

        if ($action === 1) {
            $target->takeDamage(5);
            return ;
        }

        $taget->takeDamage(10);
        $this->takeDamage(3);

        return ;
    }
}
