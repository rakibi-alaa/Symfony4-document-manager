<?php

namespace App\Controller;

use App\Entity\DocumentHeritage;
use App\Form\SearchHeritageType;
use App\Form\DocumentHeritageType;
use App\Repository\ZoneRepository;
use App\Repository\NomFeuilletRepository;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\DocumentHeritageRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DocumentHeritageController extends AbstractController
{
    /**
     * @Route("/GeoHeritage", name="geoheritage")
     */
    public function index(Request $request ,DocumentHeritageRepository $repo,ContainerInterface $container,
    ZoneRepository $repo_zone,NomFeuilletRepository $repo_nom)
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        if($this->getUser()->getActivated() == 0){
            return $this->redirectToRoute('home');
        }    
        $array_zone = $repo_zone->findAll();
        $array_nom = $repo_nom->findAll();

        $documents = $repo->findAll();
        $doc= new DocumentHeritage();

        $form = $this->createForm(SearchHeritageType::class ,$doc );

        $form->handleRequest($request);

        $cmp = 0;

        if($form->isSubmitted() && $form->isValid()){
           
            $array = [
            "numeroFeuillet" => $request->request->get("num_feuillet") ,
            "zone" => $request->request->get("zone") ,
            "coordoneeX" =>  $request->request->get("cor_x") ,
            "coordoneeY" =>  $request->request->get("cor_y"),
            "nomFeuillet" =>  $request->request->get("nom_f") ,
            "NomSite" => $request->request->get("nom"),
            "Type" => $request->request->get("type")
                  ];
          
          $filtered = array_filter($array , function($val){
              return $val != ""  ;
          });
           
          dump($filtered);
          
         $documents = $repo->findBy($filtered);
         

         if(count($filtered) == 0 || count($documents) == 0) {
             $cmp = 1;
         }
      }
      if(count($documents) == 0) { $cmp = 1;}


        $paginator = $container->get('knp_paginator');
        $result =  $paginator->paginate(
            $documents,
            $request->query->getInt('page',1),
            $request->query->getInt('limit',5)
        );


        return $this->render('document_heritage/index.html.twig',[
            'form' => $form->createView(),
            'documents' => $result,
            'count' => $cmp,
            'noms'=> $array_nom,
            'zones'=> $array_zone
        ]);
    }

    /**
     * @Route("/GeoHeritage/NewDoc", name="new_DocHeritage")
     */
    public function create(Request $request , ObjectManager $manager,
    ZoneRepository $repo_zone,NomFeuilletRepository $repo_nom)
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        if($this->getUser()->getProfile()->getId() == 1){
            return $this->redirectToRoute('authentication');
        }   

        $array_zone = $repo_zone->findAll();
        $array_nom = $repo_nom->findAll();

        $document = new DocumentHeritage();
        $form = $this->createForm(DocumentHeritageType::class ,$document);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            
            $document->setZone($request->request->get("zone"));
            $document->setNumeroFeuillet($request->request->get("num_feuillet"));
            $document->setCoordoneeX($request->request->get("cor_x"));
            $document->setCoordoneeY($request->request->get("cor_y"));
            $document->setNomSite($request->request->get("nom"));
            $document->settype($request->request->get("type"));
            $document->setNomFeuillet($request->request->get("nom_f"));

            

            /*------------ File -------------*/
            $file = $document->getfileName();
            $fileName = md5(uniqid()).'.'.$file->guessExtension();
            $file->move($this->getParameter('upload_directory'),$fileName);
            $document->setfileName($fileName);

            $manager->persist($document);
            $manager->flush();

            return $this->redirectToRoute('geoheritage'); 

        } 
        

        return $this->render('document/NewHeritage.html.twig',[
            'formDocument' => $form->createView(),
            'noms'=> $array_nom,
            'zones'=> $array_zone
        ]);
    }
}
