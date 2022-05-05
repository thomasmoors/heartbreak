<?php

namespace LenderSpender\BusinessObjects;

use LenderSpender\Collections\CardCollection;
use LenderSpender\Collections\PlayerCollection;
use LenderSpender\Helpers\Str;

class Deck extends CardCollection
{
    public function __construct()
    {
        $this->fill();
    }

    public function dealCardsTo(PlayerCollection $players)
    {
        if ($this->empty()) {
            $this->fill();
        }
        // This can be a const, but only if the number of players is always the same
        $handSize = $this->count() / $players->count();

        /** @var Player $player */
        foreach ($players as $player) {
            $player->receiveHand($this->dealHand($handSize));

            Str::printLn("{$player->name} has been dealt: {$player->hand}");
        }
    }

    public function dealHand(int $amountOfCards): Hand
    {
        return new Hand(...array_splice($this->cards, 0, $amountOfCards));
    }

    public function fill()
    {
        foreach (Suit::cases() as $suit) {
            for ($i = Card::MIN_VALUE; $i < Card::MAX_VALUE + 1; $i++) {
                $this->cards[] = new Card($suit, $i);
            }
        }
    }
}