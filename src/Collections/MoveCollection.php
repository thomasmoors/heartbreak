<?php

namespace Heartbreak\Collections;

use ArrayIterator;
use Heartbreak\BusinessObjects\Move;
use Heartbreak\BusinessObjects\Player;
use IteratorAggregate;
use Traversable;
use function count;

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

    public function moveWithHighestMatchingCard(): Move
    {
        /** @var Move $highest */
        $highest = $this->moves[0];

        /** @var Move $move */
        foreach ($this->moves as $move) {
            if ($move->card->suit === $highest->card->suit && $move->card->value > $highest->card->value) {
                $highest = $move;
            }
        }

        return $highest;
    }

    public function loser(): Player
    {
        return $this->moveWithHighestMatchingCard()->player;
    }

    public function count(): int
    {
        return count($this->moves);
    }

    public function points(): int
    {
        $points = 0;

        /** @var Move $move */
        foreach ($this->moves as $move) {
            $points += $move->card->points;
        }

        return $points;
    }
}