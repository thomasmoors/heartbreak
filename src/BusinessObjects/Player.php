<?php

namespace LenderSpender\BusinessObjects;

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
}