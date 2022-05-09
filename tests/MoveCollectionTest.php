<?php


use Heartbreak\BusinessObjects\Card;
use Heartbreak\BusinessObjects\Move;
use Heartbreak\BusinessObjects\Player;
use Heartbreak\BusinessObjects\Suit;
use Heartbreak\Collections\MoveCollection;
use PHPUnit\Framework\TestCase;

class MoveCollectionTest extends TestCase
{

    public function testMoveWithHighestMatchingCard()
    {
        $moves = new MoveCollection();

        $moves->add(new Move(new Card(Suit::Clubs, 9), new Player('A')));
        $moves->add(new Move(new Card(Suit::Spades, 9), new Player('A')));
        $moves->add(new Move(new Card(Suit::Clubs, 11), new Player('A')));
        $highest = new Move(new Card(Suit::Clubs, 12), new Player('A'));
        $moves->add($highest);

        $this->assertSame($moves->moveWithHighestMatchingCard(), $highest);

    }
}
