<?php


use Heartbreak\BusinessObjects\Card;
use Heartbreak\BusinessObjects\Deck;
use Heartbreak\BusinessObjects\Hand;
use Heartbreak\BusinessObjects\Suit;
use PHPUnit\Framework\TestCase;

class DeckTest extends TestCase
{

    public function testHas32Cards()
    {
        $deck = new Deck();

        $this->assertCount(32, $deck);
    }

    public function testDealHand()
    {
        $deck = new Deck();

        $hand = $deck->dealHand(3);

        $this->assertEquals(new Hand(new Card(Suit::Hearts, 7), new Card(Suit::Hearts, 8), new Card(Suit::Hearts, 9)), $hand);

    }
}
