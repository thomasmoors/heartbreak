<?php

namespace LenderSpender\BusinessObjects;

use LenderSpender\Collections\PlayerCollection;

class Game
{
    public PlayerCollection $players;

    public function __construct()
    {
        $roundIndex = 1;

        $this->players = new PlayerCollection();

        foreach (['John', 'Jane', 'Jan', 'Otto'] as $name) {
            $this->players->add(new Player($name));
        }

        $playerNames = $this->players->implode(', ');
        echo "Starting a game with {$playerNames}" . PHP_EOL;

        while (!$this->players->hasLoser()) {
            $startingPlayer = $this->players->getRandom();
            new Round($startingPlayer, $roundIndex, $this);
            $roundIndex++;
        }
    }
}