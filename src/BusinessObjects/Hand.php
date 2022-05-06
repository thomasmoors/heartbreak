<?php

namespace Heartbreak\BusinessObjects;

use Heartbreak\Collections\CardCollection;

class Hand extends CardCollection
{
    public function bestMatch(Card $initial): Card
    {
        $cardsOfSameSuit = $this->sameSuit($initial->suit);

        if ($cardsOfSameSuit->empty()) {
            return $this->random();
        }

        return $cardsOfSameSuit->lowest();
    }

    public function random(): Card
    {
        return $this->cards[array_rand($this->cards)];
    }
}