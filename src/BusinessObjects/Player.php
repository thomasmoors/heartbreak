<?php

namespace LenderSpender\BusinessObjects;

use LenderSpender\Collections\MoveCollection;
use LenderSpender\Helpers\Str;

class Player
{
    public string $name;
    public Score $score;
    public Hand $hand;
    public Game $game;

    public function __construct($name, Game $game)
    {
        $this->name = $name;
        $this->game = $game;
        $this->score = new Score();
    }

    public function receiveHand(Hand $hand): void
    {
        $this->hand = $hand;
    }

    public function __toString(): string
    {
        return $this->name;
    }

    public function playCard(MoveCollection $moves): void
    {
        if ($this->hand->empty()) {
            Str::printLn('Players ran out of cards. Reshuffle.');
            $this->askForNewCards();
        }

        if (!$moves->empty()) {
            $card = $this->hand->bestMatch($moves->first()->card);
        } else {
            $card = $this->hand->getRandom();
        }

        $moves->add(new Move($card, $this));

        Str::printLn("{$this->name} plays: {$card}");
        $this->hand->remove($card);
    }

    public function askForNewCards(): void
    {
        $this->game->dealCards();
    }
}