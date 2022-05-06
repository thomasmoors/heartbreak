<?php


use LenderSpender\BusinessObjects\Deck;
use PHPUnit\Framework\TestCase;

class CardTest extends TestCase
{

    public function testHas32Cards()
    {
        $deck = new Deck();
        $this->assertCount(32, $deck);
    }
}
