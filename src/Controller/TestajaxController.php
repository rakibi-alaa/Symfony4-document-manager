<?php

namespace App\Controller;

use App\Repository\DocumentRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TestajaxController extends AbstractController
{
    /**
     * @Route("/Geodoca", name="geodoc")
     */
    public function index(DocumentRepository $repo) : Response
    {
        
        return new JsonResponse(array('documents' => $repo->findAll()));
    }
    
}
