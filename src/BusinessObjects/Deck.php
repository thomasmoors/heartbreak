<?php

namespace LenderSpender\BusinessObjects;

use ArrayIterator;
use Countable;
use IteratorAggregate;
use Traversable;
use function shuffle;
use function \empty;

class Deck implements Countable, IteratorAggregate
{
    public array $cards = [];

    public function __construct()
    {
        $this->fill();
    }

    public function fill()
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
        shuffle($this->cards);
    }

    public function count(): int
    {
        return count($this->cards);
    }

    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->cards);
    }

    public function dealHand(int $amountOfCards): Hand
    {
        if ($this->empty()) {
            $this->fill();
        }

        return new Hand(...array_splice($this->cards, 0, $amountOfCards));
    }

    public function empty(): bool
    {
        return empty($this->cards);
    }

    public function __toString(): string
    {
        return implode(', ', $this->cards);
    }
}