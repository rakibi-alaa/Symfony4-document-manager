<?php

namespace App\Controller;

use App\Entity\Document;
use App\Form\SearchType;
use App\Form\DocumentFormType;
use App\Repository\ZoneRepository;
use App\Repository\DocumentRepository;
use App\Repository\NomFeuilletRepository;
use App\Repository\TypeDocumentRepository;
use Symfony\Component\HttpFoundation\Request;


use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Repository\DomaineLithosctructuralRepository;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class GeodocController extends AbstractController
{
    /**
     * @Route("/GeoDoc", name="geodoc")
     */
    public function index(Request $request ,DocumentRepository $repo,ContainerInterface $container,
    ZoneRepository $repo_zone,NomFeuilletRepository $repo_nom,TypeDocumentRepository $repo_type,
    DomaineLithosctructuralRepository $repo_domain)
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        
        if($this->getUser()->getActivated() == 0){
            return $this->redirectToRoute('home');
        }
        $array_zone = $repo_zone->findAll();
        $array_nom = $repo_nom->findAll();
        $array_domain = $repo_domain->findAll();
        $array_type = $repo_type->findAll();

        $documents = $repo->findAll();
        $doc= new Document();
        

        $form = $this->createForm(SearchType::class ,$doc );

        $form->handleRequest($request);

        
        $cmp = 0;
        if($form->isSubmitted() && $form->isValid()){
           
            $date = $request->request->get('date_p');
              if($date !== "") {
                $date = new \DateTime($date);
              }
            

           $array = [
                "titre" => $request->request->get('titre') ,
                "domainEtude" => $request->request->get('domain_etude') ,
                "autheurIndividue" => $request->request->get('autheur_indiv') ,
                "autheurCompanie" => $request->request->get('autheur_comp') ,
                "numeroFeuillet" => $request->request->get('num_feuillet') ,
                "datePublication" =>$date ,
                "typeDocument" => $request->request->get('type'),
                "nomFeuillet" => $request->request->get('nom') ,
                "zone" => $request->request->get('zone'),
                "domaineLithosctructural" => $request->request->get('domain_litho') 
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
        if( count($documents) == 0) {$cmp = 1;}
        
         return $this->render('geodoc/index.html.twig',[
             'form' => $form->createView(),
            'documents' => $result,
            'count' => $cmp,
            'noms'=> $array_nom,
            'zones'=> $array_zone,
            'types'=> $array_type,
            'domains'=> $array_domain
        ]);
    }

    /**
     * @Route("/NewDoc", name="new_doc")
     */
    public function create(Request $request , ObjectManager $manager,
    ZoneRepository $repo_zone,NomFeuilletRepository $repo_nom,TypeDocumentRepository $repo_type,
    DomaineLithosctructuralRepository $repo_domain)
    {
        $array_zone = $repo_zone->findAll();
        $array_nom = $repo_nom->findAll();
        $array_domain = $repo_domain->findAll();
        $array_type = $repo_type->findAll();
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        if($this->getUser()->getProfile()->getId() == 1){
            return $this->redirectToRoute('authentication');
        }   

        $document = new Document();
        $form = $this->createForm(DocumentFormType::class ,$document);
        $form->handleRequest($request);

        $type = $request->request->get('type');
        $nom = $request->request->get('nom');
        $zone = $request->request->get('zone');
        $domain = $request->request->get('domain_litho');

        if($form->isSubmitted() && $form->isValid()){
            $document->setDatePublication(new \DateTime());
            $document->setTypeDocument($type);
            $document->setZone($zone);
            $document->setNomFeuillet($nom);
            $document->setDomaineLithosctructural($domain);

            /************** File *****************/
            $file = $document->getfileName();
            $fileName = md5(uniqid()).'.'.$file->guessExtension();
            $file->move($this->getParameter('upload_directory'),$fileName);
            $document->setfileName($fileName);

            $manager->persist($document);
            $manager->flush();

            return $this->redirectToRoute('geodoc');

        }
        

        return $this->render('document/new.html.twig',[
            'formDocument' => $form->createView(),
            'noms'=> $array_nom,
            'zones'=> $array_zone,
            'types'=> $array_type,
            'domains'=> $array_domain
        ]);
    }

    /**
     * @Route("/geodoc/download/{file}/alae", name="download")
     */
    public function download($file)
    {
        $response = new Response();
        $FolderPath = $this->getParameter('upload_directory');
        $fileName = '/' . $file;
        
        $file = new File($FolderPath.$fileName);
        $response->setContent(readfile($file));
        return $response;

       
    }
    /**
     * @Route("/geodoc/recherche", name="recherche")
     */
    public function recherche_zone(Request $request , DocumentRepository $repo)
    {
        $date = $request->request->get('date') ;


        return $this->render('geodoc/index.html.twig',[
            'documents' => $documents
        ]);

       
    }

    
     
    
}
