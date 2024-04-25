<?php

namespace App\Entity;

class Card
{
    private $rank;
    private $suit;
    private $suitSymbol;

    public function __construct($rank, $suit, $suitSymbol)
    {
        $this->rank = $rank;
        $this->suit = $suit;
        $this->suitSymbol = $suitSymbol;
    }

    public function getRank()
    {
        return $this->rank;
    }

    public function getSuit()
    {
        return $this->suit;
    }

    public function getSuitSymbol()
    {
        return $this->suitSymbol;
    }
}
