<?php

namespace LenderSpender\BusinessObjects;

class Game
{
    public $players = [];

    public function __construct()
    {


        foreach (['John', 'Jane', 'Jan', 'Otto'] as $name) {
            $this->players[] = new Player($name);
        }

        $loser = false;

        while (!$loser) {
            $startingPlayer = $this->players[array_rand($this->players)];
            echo "{$startingPlayer->name} starts this round" . PHP_EOL;
            new Round($startingPlayer, $this);
            $loser = Score::hasLoser($this->players);
        }
    }
}