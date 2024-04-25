<?php

namespace App\Entity;

class Deck
{
    private $cards = [];

    public function __construct()
    {
        $suits = [
            'Hearts' => '♥',
            'Diamonds' => '♦',
            'Clubs' => '♣',
            'Spades' => '♠'
        ];
        $ranks = ['2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K', 'A'];

        foreach ($suits as $suit => $symbol) {
            foreach ($ranks as $rank) {
                $this->cards[] = new Card($rank, $suit, $symbol);
            }
        }
    }

    public function getCards()
    {
        return $this->cards;
    }

    public function shuffle()
    {
        shuffle($this->cards);
    }

    public function drawCard()
    {
        return array_shift($this->cards);
    }

    public function getSortedCards()
    {
        $cards = $this->cards; // Copy the array to avoid modifying the original order
        usort($cards, function ($cardA, $cardB) {
            // Assuming each card has a suit and a rank that can be compared
            if ($cardA->getSuit() == $cardB->getSuit()) {
                return $cardA->getRank() <=> $cardB->getRank();
            }
            return $cardA->getSuit() <=> $cardB->getSuit();
        });
        return $cards;
    }
}
