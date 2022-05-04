<?php

namespace LenderSpender\BusinessObjects;

use LenderSpender\Collections\PlayerCollection;
use LenderSpender\Helpers\Str;

class Game
{
    public PlayerCollection $players;
    public Deck $deck;

    public function __construct()
    {
        $roundIndex = 1;

        $this->players = new PlayerCollection(['John', 'Jane', 'Jan', 'Otto']);

        Str::printLn("Starting a game with {$this->players}");

        $this->deck = new Deck();
        $this->deck->dealCardsTo($this->players);

        while (!$this->players->hasLoser()) {
            $startingPlayer = $this->players->getRandom();
            new Round($startingPlayer, $roundIndex, $this);
            $roundIndex++;
            die;
        }
    }
}