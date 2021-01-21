<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserEventController extends AbstractController
{
    #[Route('/user/event', name: 'user_event')]
    public function index(): Response
    {
        return $this->render('user_event/index.html.twig', [
            'controller_name' => 'UserEventController',
        ]);
    }
}
