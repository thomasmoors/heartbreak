<?php

namespace LenderSpender\Collections;

use ArrayAccess;
use ArrayIterator;
use Countable;
use IteratorAggregate;
use LenderSpender\BusinessObjects\Player;
use LenderSpender\BusinessObjects\Score;
use Traversable;
use TypeError;
use function implode;

class PlayerCollection implements Countable, IteratorAggregate, ArrayAccess
{

    private array $players = [];

    public function __construct(array $names)
    {
        foreach ($names as $name) {
            $this->add(new Player($name));
        }
    }

    public function add(Player $player): void
    {
        $this->players[] = $player;
    }

    public function count(): int
    {
        return count($this->players);
    }

    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->players);
    }

    public function offsetExists(mixed $offset): bool
    {
        return isset($this->players[$offset]);
    }

    public function offsetGet(mixed $offset): mixed
    {
        return $this->players[$offset];
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        if ($value instanceof Player) {
            $this->players[$offset] = $value;
        } else {
            throw new TypeError('Value is not an instance of Player');
        }
    }

    public function offsetUnset(mixed $offset): void
    {
        unset($this->players[$offset]);
    }

    public function getRandom(): Player
    {
        return $this->players[array_rand($this->players)];
    }

    public function hasLoser(): bool
    {
        return $this->loser() instanceof Player;
    }

    public function loser(): ?Player
    {
        foreach ($this->players as $player) {
            if ($player->score->value >= Score::LOSING_SCORE) {
                return $player;
            }
        }

        return null;
    }

    public function __toString(): string
    {
        return $this->implode(', ');
    }

    public function implode(string $separator = ''): string
    {
        return implode($separator, $this->players);
    }
}