<?php

namespace LenderSpender\BusinessObjects;

class Card
{

    public Suit $suit;
    public int $value;
    public int $points = 0;

    public const MIN_VALUE = 7;
    public const MAX_VALUE = 14;

    public function __construct(Suit $suit, int $value)
    {
        $this->suit = $suit;
        $this->value = $value;

        if ($suit === Suit::Hearts) {
            $this->points = 1;
        }

        if ($suit === Suit::Clubs && $value === 11) {
            $this->points = 2;
        }

        if ($suit === Suit::Spades && $value === 12) {
            $this->points = 1;
        }
    }

    public function valueToName()
    {
        switch ($this->value) {
            case 11:
                return 'Jack';
            case 12:
                return 'Queen';
            case 13:
                return 'King';
            case 14:
                return 'Ace';
            default:
                return $this->value;
        }
    }

    public function __toString(): string
    {
        return "{$this->suit->value}{$this->valueToName()}";
    }

}