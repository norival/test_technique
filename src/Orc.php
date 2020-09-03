<?php

namespace Game;

class Orc extends Personnage
{
    public function play(Personnage $target)
    {
        $this->resolvePoison();

        $action = rand(1, 2);

        if ($action === 1) {
            $target->takeDamage(5);
            return;
        }

        return ;
    }
}
