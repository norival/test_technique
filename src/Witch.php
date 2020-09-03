<?php

namespace Game;

class Witch extends Personnage
{
    public function play(Personnage $target)
    {
        $this->resolvePoison();

        $action = rand(1, 2);

        if ($action === 1) {
            $target->takeDamage(3);
            $target->takePoison(3, 3);

            return;
        }

        $this->heal(4);
        return ;
    }

    public function heal(int $pv)
    {
        $this->pv += $pv;
    }
}
