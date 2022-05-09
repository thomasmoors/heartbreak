<?php


use Heartbreak\BusinessObjects\Card;
use Heartbreak\BusinessObjects\Suit;
use PHPUnit\Framework\TestCase;

class CardTest extends TestCase
{

    public function test_creation_max()
    {
        $this->expectException(Exception::class);

        new Card(Suit::Clubs, 15);
    }

    public function test_creation_min()
    {
        $this->expectException(Exception::class);

        new Card(Suit::Clubs, 6);
    }
}
