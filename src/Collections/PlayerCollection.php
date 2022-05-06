<?php

namespace Heartbreak\Collections;

use ArrayAccess;
use ArrayIterator;
use Countable;
use Exception;
use IteratorAggregate;
use Heartbreak\BusinessObjects\Player;
use Heartbreak\BusinessObjects\Score;
use Traversable;
use TypeError;
use function implode;

class PlayerCollection implements Countable, IteratorAggregate, ArrayAccess
{

    protected array $players = [];

    public function __construct(string ...$names)
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

    public function random(): Player
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

    public function forEach(callable $function, Player $start = null): void
    {
        $current = $start ?? $this->players[0];

        do {
            call_user_func($function, $current);
            $current = $this->next($current);
        } while ($current !== $start);
    }

    public function next(Player $current): Player
    {
        $index = array_search($current, $this->players);

        if ($index === false) {
            throw new Exception('Player does not exist');
        }

        $next = $index + 1;

        if ($this->offsetExists($next)) {
            return $this->players[$next];
        }

        return $this->players[0];
    }

    public function offsetExists(mixed $offset): bool
    {
        return isset($this->players[$offset]);
    }
}