<?php

namespace LenderSpender\BusinessObjects;

use LenderSpender\Collections\CardCollection;

class Hand extends CardCollection
{
    public function __construct(Card ...$cards)
    {
        $this->cards = $cards;
    }
}