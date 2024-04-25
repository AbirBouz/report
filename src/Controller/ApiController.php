<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApiController
{
    #[Route('/api', name: 'api')]
    public function index(): Response
    {
        $html = '<html><body>';
        $html .= '<h1>API Overview</h1>';
        $html .= '<ul>';
        $html .= '<li><a href="/api/lucky/number">Generate a Lucky Number</a> - Returns a JSON with a random number and a message.</li>';
        $html .= '<li><a href="/api/quote">Get Quote of the Day</a> - Returns the quote of the day in JSON format.</li>';
        $html .= '<li><a href="/card/deck">Get Deck</a> - Retrieves the full deck sorted by suit and rank in JSON format.</li>';
        $html .= '<li><a href="/card/deck/shuffle">Shuffle Deck</a> - Shuffles the deck and returns it in JSON format.</li>';
        $html .= '<li><a href="/card/deck/draw">Draw a Card</a> - Draws a single card from the deck and returns it along with the remaining count in JSON format.</li>';
        $html .= '<li><a href="/card/deck/draw/5">Draw Multiple Cards</a> - Draws multiple cards from the deck and returns them along with the remaining count in JSON format.</li>';
        $html .= '</ul>';
        $html .= '</body></html>';
        return new Response($html);
    }

}
