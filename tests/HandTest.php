<?php

use Heartbreak\BusinessObjects\Card;
use Heartbreak\BusinessObjects\Hand;
use Heartbreak\BusinessObjects\Suit;
use PHPUnit\Framework\TestCase;

class HandTest extends TestCase
{

    public function testBestMatch()
    {
        $hand = new Hand(
            new Card(Suit::Clubs, 8),
            new Card(Suit::Clubs, 12),
            new Card(Suit::Hearts, 7)
        );

        $firstCard = new Card(Suit::Clubs, 11);

        $this->assertEquals(new Card(Suit::Clubs, 8), $hand->bestMatch($firstCard));
    }
}
