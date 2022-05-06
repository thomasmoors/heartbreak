<?php

namespace Heartbreak\BusinessObjects;

use Heartbreak\Collections\PlayerCollection;
use Heartbreak\Helpers\Str;

class Game
{
    private static ?Game $instance = null;
    public PlayerCollection $players;
    public Deck $deck;
    public array $rounds = [];

    private function __construct()
    {

    }

    public static function instance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function setup(): void
    {
        #region setup
        $roundIndex = 1;

        $this->players = new PlayerCollection('John', 'Jane', 'Jan', 'Otto');

        Str::printLn("Starting a game with {$this->players}");

        $this->deck = new Deck();
        $this->dealCards();

        $startingPlayer = $this->players->random();
        #endregion

        while (!$this->players->hasLoser()) {

            $this->rounds[] = new Round($startingPlayer, $roundIndex);
            $startingPlayer = $this->players->next($startingPlayer);

            $roundIndex++;

            if ($roundIndex == 5) {
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