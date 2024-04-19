<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LuckyController
{
    #[Route('/lucky/number')]
    public function number(): Response
    {
        $number = random_int(0, 100);

        return new Response(
            '<!DOCTYPE html>
            <html>
            <head>
                <link rel="stylesheet" type="text/css" href="kmom01/symfony/app/assets/styles/luckynumber.css">
            </head>
            <body>
                <div class="lucky-number-display">Lucky number: '.$number.'</div>
            </body>
            </html>'
        );
    }

    #[Route("/lucky/hi")]
    public function hi(): Response
    {
        return new Response(
            '<html><body>Hi to you!</body></html>'
        );
    }


}
