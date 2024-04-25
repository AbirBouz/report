<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use App\Entity\Deck;

class CardController extends AbstractController
{
    #[Route('/card', name: 'card_home')]
    public function index(SessionInterface $session): Response
    {
        if (!$session->has('deck')) {
            $session->set('deck', new Deck());
        }

        return $this->render('card/index.html.twig');
    }

    #[Route('/card/deck', name: 'card_deck')]
    public function showDeck(SessionInterface $session): Response
    {
        $deck = $session->get('deck', new Deck()); // Get the deck from the session or create a new one
        $cards = $deck->getSortedCards(); // Assuming this method returns sorted cards

        return $this->render('card/deck.html.twig', ['cards' => $cards]);
    }

    #[Route('/card/deck/draw', name: 'card_deck_draw')]
    public function drawCard(SessionInterface $session)
    {
        $deck = $session->get('deck', new Deck());
        $card = $deck->drawCard();
        $session->set('deck', $deck);

        return $this->render('card/draw.html.twig', [
            'card' => $card,
            'remaining' => count($deck->getCards())
        ]);
    }

    #[Route('/card/deck/shuffle', name: 'card_deck_shuffle')]
    public function shuffle(SessionInterface $session): Response
    {
        $deck = $session->get('deck', new Deck());
        $deck->shuffle();

        return $this->render('card/shuffle.html.twig', ['cards' => $deck->getCards()]);
    }

    #[Route('/card/deck/draw/{number}', name: 'card_deck_draw_multiple')]
    public function drawMultipleCards(SessionInterface $session, int $number): Response
    {
        $deck = $session->get('deck', new Deck());

        $cards = [];
        for ($i = 0; $i < $number; $i++) {
            if (count($deck->getCards()) > 0) {
                $cards[] = $deck->drawCard();
            } else {
                break;
            }
        }

        $session->set('deck', $deck);

        return $this->render('card/draw_multiple.html.twig', [
            'cards' => $cards,
            'remaining' => count($deck->getCards())
        ]);
    }



}
