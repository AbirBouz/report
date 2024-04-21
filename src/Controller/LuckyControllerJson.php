<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LuckyControllerJson
{
    #[Route("/api/lucky/number")]
    public function jsonNumber(): Response
    {
        $number = random_int(0, 100);

        $data = [
            'lucky-number' => $number,
            'lucky-message' => 'Hi there!',
        ];

          // return new JsonResponse($data);

          $response = new JsonResponse($data);
          $response->setEncodingOptions(
              $response->getEncodingOptions() | JSON_PRETTY_PRINT
          );
          return $response;
    }
    #[Route("/lucky/number/json", name: "lucky_number_json")]
        public function numberJson(): Response
        {
            $number = random_int(0, 100);
            return new JsonResponse(['number' => $number]);
        }
}   

class ApiController
{
        #[Route('/api', name: 'api_index')]
        public function index(): Response
        {
            // Här kan du skriva HTML-koden direkt eller använda Twig för att rendera en sida
            $html = '<html><body>';
            $html .= '<h1>API Index</h1>';
            $html .= '<ul>';
            $html .= '<li><a href="/api/quote">API Quote</a></li>';
            // Lägg till fler rutter här som länkar
            $html .= '</ul>';
            $html .= '</body></html>';
    
            return new Response($html);
        }
    }

