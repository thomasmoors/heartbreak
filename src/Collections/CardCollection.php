<?php

namespace LenderSpender\Collections;

use ArrayIterator;
use Countable;
use IteratorAggregate;
use LenderSpender\BusinessObjects\Card;
use LenderSpender\BusinessObjects\Suit;
use Traversable;
use function count;
use function shuffle;

class CardCollection implements Countable, IteratorAggregate
{
    protected array $cards = [];

    public function __construct(Card ...$cards)
    {
        $this->cards = $cards;
    }

    public function shuffle(): void
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

    public function sameSuit(Suit $suit): self
    {
        return $this->filter(function (Card $card) use ($suit) {
            return $suit === $card->suit;
        });
    }

    public function filter(callable $callback): self
    {
        return new CardCollection(...array_filter($this->cards, $callback, ARRAY_FILTER_USE_BOTH));
    }

    public function lowest(): ?Card
    {
        if (!array_key_exists(0, $this->cards)) {
            return null;
        }

        $lowest = $this->cards[0];

        /** @var Card $card */
        foreach ($this->cards as $card) {
            if ($card->value < $lowest->value) {
                $lowest = $card;
            }
        }

        return $lowest;
    }

    public function remove(Card $card): void
    {
        if (($key = array_search($card, $this->cards)) !== false) {
            unset($this->cards[$key]);
        }
    }
}