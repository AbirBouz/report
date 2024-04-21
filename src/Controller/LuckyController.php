<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use DateTime;

class LuckyController
{
    #[Route('/lucky/number', name: 'lucky_number')]
    public function number(): Response
    {
        $number = random_int(0, 100);

        // Använd heredoc-syntax för bättre läsbarhet
        $html = <<<HTML
        <!DOCTYPE html>
        <html>
        <head>
            <link rel="stylesheet" type="text/css" href="/assets/styles/luckynumber.css">
        </head>
        <body>
            <div class="lucky-number-display">Lucky number: $number</div>
        </body>
        </html>
        HTML;

        return new Response($html);
    }

    #[Route("/lucky/hi")]
    public function hi(): Response
    {
        // Enklare HTML-struktur
        return new Response('<html><body>Hi to you!</body></html>');
    }

    #[Route('/api/quote', name: 'api_quote')]
    public function quote(): JsonResponse
    {
        $quotes = [
            "Alla våra drömmar kan gå i uppfyllelse om vi har modet att följa dem. — Walt Disney",
            "Det är aldrig för sent att bli vad man kunde ha blivit. — George Eliot",
            "Vad du än är, var en bra en. — Abraham Lincoln"
        ];

        $quote = $quotes[array_rand($quotes)];
        $data = [
            'quote' => $quote,
            'date' => (new DateTime())->format('Y-m-d'),
            'timestamp' => time()
        ];

        return new JsonResponse($data);
    }
}
