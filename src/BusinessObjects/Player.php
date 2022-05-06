<?php

namespace Heartbreak\BusinessObjects;

use Heartbreak\Collections\MoveCollection;
use Heartbreak\Helpers\Str;

class Player
{
    public string $name;
    public Score $score;
    public Hand $hand;

    public function __construct($name)
    {
        $this->name = $name;
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
            $card = $this->hand->random();
        }

        $moves->add(new Move($card, $this));

        Str::printLn("{$this->name} plays: {$card}");
        $this->hand->remove($card);
    }

    public function askForNewCards(): void
    {
        Game::instance()->dealCards();
    }

    public function addPoints(int $points): void
    {
        $this->score->addPoints($points);
    }
}