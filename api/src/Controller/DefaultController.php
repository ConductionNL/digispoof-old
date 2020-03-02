<?php

// src/Controller/DefaultController.php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use App\Service\BRPService; 

class DefaultController extends AbstractController
{
    /**
     * @Route("/")
     * @Template
     */
	public function indexAction(Request $request, BRPService $BRPService)
    {    	
    	$token = $request->query->get('token');
    	$responceUrl = $request->query->get('responceUrl');
    	$people = $BRPService->getAllPersons();
    	    	
    	return ['people'=>$people, 'responceUrl' => $responceUrl, 'token' => $token];
    }
}
