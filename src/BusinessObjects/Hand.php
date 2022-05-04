<?php

namespace LenderSpender\BusinessObjects;

/*
 * TODO
 * Hand does not truly extend Deck, however in this case it does make things more compact
 * Both are a collection of cards
 * Consider to remove this extension
 */

class Hand extends Deck
{
    public function __construct(Card ...$cards)
    {
        $this->cards = $cards;
    }
}