<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Request;

class SessionController extends AbstractController
{
    #[Route('/session', name: 'app_session')]
    public function index(SessionInterface $session): Response
    {
        // Hämta alla flash-meddelanden under nyckeln 'status'
        $flashMessages = $session->getFlashBag()->all();

        return $this->render('session/index.html.twig', [
            'controller_name' => 'SessionController',
            'flash_messages' => $flashMessages['status'] ?? [], // Säkerställ att 'status' finns som nyckel
        ]);
    }

    #[Route('/session/delete', name: 'session_delete')]
    public function delete(SessionInterface $session): Response
    {
        // Clear all data from the session
        $session->clear();

        // Optionally add a flash message to confirm deletion
        $this->addFlash('notice', 'Session data has been cleared!');

        // Redirect back to the session page or any other page
        return $this->redirectToRoute('app_session'); // Change 'app_session' to whatever route you want to redirect to
    }
}
