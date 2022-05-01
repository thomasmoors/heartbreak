<?php

namespace LenderSpender\BusinessObjects;

class Deck
{
    public array $cards;

    public function __construct()
    {
        foreach (Suit::cases() as $suit) {
            for ($i = CARD::MIN_VALUE; $i < CARD::MAX_VALUE + 1; $i++) {
                $this->cards[] = new Card($suit, $i);
            }
        }

        $this->shuffle();
    }

    public function shuffle()
    {
        \shuffle($this->cards);
    }

}