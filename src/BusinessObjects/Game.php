<?php

namespace LenderSpender\BusinessObjects;

use LenderSpender\Collections\PlayerCollection;
use LenderSpender\Helpers\Str;

class Game
{
    public PlayerCollection $players;
    public Deck $deck;
    public array $rounds = [];

    public function __construct()
    {
        #region setup
        $roundIndex = 1;

        $this->players = new PlayerCollection(['John', 'Jane', 'Jan', 'Otto'], $this);

        Str::printLn("Starting a game with {$this->players}");

        $this->deck = new Deck();
        $this->dealCards();

        $startingPlayer = $this->players->getRandom();
        #endregion

        while (!$this->players->hasLoser()) {

            $this->rounds[] = new Round($startingPlayer, $roundIndex, $this);
            $startingPlayer = $this->players->next($startingPlayer);

            $roundIndex++;

            if ($roundIndex == 2) {
                die;

            }
        }
    }

    public function dealCards(): void
    {
        $this->deck->shuffle();
        $this->deck->dealCardsTo($this->players);
    }
}