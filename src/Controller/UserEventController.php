<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Services\UserEventService;
use Exception;

class UserEventController extends AbstractController
{
    #[Route('/user/event', name: 'user_event')]
    public function index(): Response
    {
        return $this->render('user_event/index.html.twig', [
            'controller_name' => 'UserEventController',
        ]);
    }

    /**
    * @Route("/api/dataUsers", name="dataUsers")
    * @return \Symfony\Component\HttpFoundation\JsonResponse
    */
    public function show(UserEventService $userEventRepository): Response
    {
    	try {
    		$beginDate  = date('Y-m-d', strtotime('-30 days')) . ' 00:00:00';
            $finishDate = date('Y-m-d') . ' 23:59:59';            
            $dataEvents = $userEventRepository->userEventList($beginDate, $finishDate);            
    	} catch (Exception $e) {
			$dataEvents = [];
    	}
        $response = new Response();

        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');      
        $response->setContent(json_encode($dataEvents));        
        return $response;
    }
}
