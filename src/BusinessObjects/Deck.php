<?php

namespace LenderSpender\BusinessObjects;

use LenderSpender\Collections\CardCollection;
use LenderSpender\Collections\PlayerCollection;
use LenderSpender\Helpers\Str;

class Deck extends CardCollection
{
    public function dealCardsTo(PlayerCollection $players)
    {
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
        if ($this->empty()) {
            $this->fill();
        }

        return new Hand(...array_splice($this->cards, 0, $amountOfCards));
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
}