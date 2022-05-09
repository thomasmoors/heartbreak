<?php


use Heartbreak\BusinessObjects\Deck;
use PHPUnit\Framework\TestCase;

class DeckTest extends TestCase
{

    public function testHas32Cards()
    {
        $deck = new Deck();
        $this->assertCount(32, $deck);
    }
}
