<?php

namespace LenderSpender\Collections;

use ArrayIterator;
use Countable;
use IteratorAggregate;
use Traversable;
use function \count;
use function shuffle;

class CardCollection implements Countable, IteratorAggregate
{
    public array $cards = [];

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

    public function empty(): bool
    {
        return empty($this->cards);
    }

    public function __toString(): string
    {
        return implode(', ', $this->cards);
    }
}