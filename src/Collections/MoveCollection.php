<?php

namespace Heartbreak\Collections;

use ArrayIterator;
use IteratorAggregate;
use Heartbreak\BusinessObjects\Move;
use Heartbreak\BusinessObjects\Player;
use Traversable;
use function \empty;

class MoveCollection implements IteratorAggregate, \Countable
{
    protected array $moves = [];

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

    public function loser(): Player
    {

    }

    public function count(): int
    {
        return count($this->moves);
    }
}