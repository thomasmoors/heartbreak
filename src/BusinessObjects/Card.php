<?php

namespace LenderSpender\BusinessObjects;

class Card
{

    public const MIN_VALUE = 7;
    public const MAX_VALUE = 14;
    public Suit $suit;
    public int $value;
    public int $points = 0;

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

    public function __toString(): string
    {
        return "{$this->suit->value}{$this->valueToName()}";
    }

    public function valueToName()
    {
        switch ($this->value) {
            case 11:
                return 'J';
            case 12:
                return 'Q';
            case 13:
                return 'K';
            case 14:
                return 'A';
            default:
                return $this->value;
        }
    }

}