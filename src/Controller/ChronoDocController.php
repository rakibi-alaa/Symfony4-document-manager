<?php

namespace App\Controller;

use App\Form\ChronoDocType;
use App\Entity\DocumentChrono;
use App\Form\SearchChronoType;
use App\Repository\ZoneRepository;
use App\Repository\NomFeuilletRepository;
use App\Repository\DocumentChronoRepository;
use App\Repository\MaterialAnalyseRepository;
use App\Repository\SystemIsoptiqueRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ChronoDocController extends AbstractController
{
    /**
     * @Route("/GeoChrono", name="geochrono")
     */
    public function index(Request $request ,DocumentChronoRepository $repo,ContainerInterface $container,
    ZoneRepository $repo_zone,NomFeuilletRepository $repo_nom,SystemIsoptiqueRepository $repo_system,
    MaterialAnalyseRepository $repo_material)
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        if($this->getUser()->getActivated() == 0){
            return $this->redirectToRoute('home');
        }  
        
        $array_zone = $repo_zone->findAll();
        $array_nom = $repo_nom->findAll();
        $array_system = $repo_system->findAll();
        $array_material = $repo_material->findAll();

        $documents = $repo->findAll();
        $doc= new DocumentChrono();

        $form = $this->createForm(ChronoDocType::class ,$doc );

        $form->handleRequest($request);

            

        $cmp = 0;

        if($form->isSubmitted() && $form->isValid()){
           
            $array = [
            "numeroFeuillet" => $request->request->get("num_feuillet") ,
            "zone" => $request->request->get("zone") ,
            "identifiant" => $request->request->get("identifiant"),
            "coordonneX" => $request->request->get("cor_x") ,
            "coordonneY" => $request->request->get("cor_y"),
            "nomFeuillet" => $request->request->get("nom") ,
            "systemeIsoptique" => $request->request->get("systeme"),
            "materialAnalyse" => $request->request->get("material") 
                  ];
          
          $filtered = array_filter($array , function($val){
              return $val != "";
          });
           
         
          
         $documents = $repo->findBy($filtered);
         

         if(count($filtered) == 0 || count($documents) == 0) {
             $cmp = 1;
         }
      }


        $paginator = $container->get('knp_paginator');
        $result =  $paginator->paginate(
            $documents,
            $request->query->getInt('page',1),
            $request->query->getInt('limit',5)
        );

        if(count($documents) == 0) { $cmp = 1;}

        return $this->render('chrono_doc/index.html.twig',[
            'form' => $form->createView(),
            'documents' => $result,
            'count' => $cmp,
            'noms' => $array_nom,
            'zones' => $array_zone,
            'systems' => $array_system,
            'materials' => $array_material
        ]);
    }

    /**
     * @Route("/GeoChrno/NewDoc", name="new_DocChrono")
     */
    public function create(Request $request , ObjectManager $manager,
    ZoneRepository $repo_zone,NomFeuilletRepository $repo_nom,SystemIsoptiqueRepository $repo_system,
    MaterialAnalyseRepository $repo_material)
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        if($this->getUser()->getProfile()->getId() == 1){
            return $this->redirectToRoute('authentication');
        }   
        $array_zone = $repo_zone->findAll();
        $array_nom = $repo_nom->findAll();
        $array_system = $repo_system->findAll();
        $array_material = $repo_material->findAll();

        $document = new DocumentChrono();
        $form = $this->createForm(SearchChronoType::class ,$document);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            
            
            $document->setZone($request->request->get("zone"));
            $document->setNumeroFeuillet($request->request->get("num_feuillet"));
            $document->setIdentifiant($request->request->get("identifiant"));
            $document->setCoordonneX($request->request->get("cor_x"));
            $document->setCoordonneY($request->request->get("cor_y"));
            $document->setSystemeIsoptique($request->request->get("systeme"));
            $document->setMaterialAnalyse($request->request->get("material"));
            $document->setNomFeuillet($request->request->get("nom"));
            

            /*------------ File -------------*/
            $file = $document->getfileName();
            $fileName = md5(uniqid()).'.'.$file->guessExtension();
            $file->move($this->getParameter('upload_directory'),$fileName);
            $document->setfileName($fileName);

            $manager->persist($document);
            $manager->flush();

            return $this->redirectToRoute('geochrono'); 

        } 
        

        return $this->render('document/NewChrono.html.twig',[
            'formDocument' => $form->createView(),
            'noms' => $array_nom,
            'zones' => $array_zone,
            'systems' => $array_system,
            'materials' => $array_material
        ]);
    }
}
