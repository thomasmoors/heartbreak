<?php

namespace LenderSpender\BusinessObjects;

use LenderSpender\Collections\CardCollection;

class Hand extends CardCollection
{
    public function getRandom(): Card
    {
        return $this->cards[array_rand($this->cards)];
    }

    public function bestMatch(Card $initial): Card
    {
        $cardsOfSameSuit = $this->sameSuit($initial->suit);

        if ($cardsOfSameSuit->empty()) {
            return $this->getRandom();
        }

        return $cardsOfSameSuit->lowest();
    }
}