<?php

namespace LenderSpender\Collections;

use ArrayIterator;
use IteratorAggregate;
use LenderSpender\BusinessObjects\Move;
use Traversable;
use function \empty;

class MoveCollection implements IteratorAggregate
{
    public array $moves = [];

    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->moves);
    }

    public function add(Move $move): void
    {
        $this->moves[] = $move;
    }

    public function empty(): bool
    {
        return empty($this->moves);
    }

    public function first(): ?Move
    {
        return $this->moves[0] ?? null;
    }
}