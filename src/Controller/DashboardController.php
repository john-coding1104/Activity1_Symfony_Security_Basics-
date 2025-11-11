<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class DashboardController extends AbstractController
{
    #[Route('/dashboard', name: 'app_dashboard')]
    #[IsGranted('ROLE_USER')]
    public function index(): Response
    {
        $user = $this->getUser();

        if ($this->isGranted('ROLE_ADMIN')) {
            $message = "You are logged in as Admin. You have full access.";
        } else {
            $message = "You are logged in as Regular User. Limited access granted.";
        }

        return $this->render('dashboard/index.html.twig', [
            'message' => $message,
            'username' => $user ? $user->getUserIdentifier() : 'Guest',
        ]);
    }
}
