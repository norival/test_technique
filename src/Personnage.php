<?php

namespace Game;

class Personnage
{
    protected $alive;
    protected $name;
    protected $pv;
    protected $state;

    public function __construct($name)
    {
        $this->name = $name;
        $this->state = [
            'state'          => 'sain',
            'dpt'            => 0,
            'tours_restants' => 0,
        ];
        $this->pv = 50;
        $this->alive = true;
    }

    public function resolvePoison()
    {
        if ($this->state['state'] === 'empoisonne') {
            $this->takeDamage($this->state['dpt']);
            if (--$this->state['tours_restants'] === 0) {
                $this->state['state'] = 'sain';
                $this->state['dpt']   = 0;
            }

            return ;
        }

        return ;
    }

    public function getPv()
    {
        return $this->pv;
    }

    public function getState()
    {
        return $this->state;
    }

    public function getName()
    {
        return $this->name;
    }

    public function takeDamage(int $damage)
    {
        $this->pv -= $damage;

        if ($this->pv <= 0) {
            $this->alive = false;

            return;
        }

        return;
    }

    public function isAlive()
    {
        return $this->alive;
    }

    public function takePoison(int $turns, int $damage)
    {
        $this->takeDamage($damage);
        $this->state = [
            'sate' => 'empoisonne',
            'tours_restants' => $turns,
        ];
    }

    public function getData()
    {
        return [
            'nom'   => $this->name,
            'sante' => $this->state,
            'pv'    => $this->pv,
            'alive' => $this->alive,
        ];
    }
}
