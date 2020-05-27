<?php

namespace App\Controller;

use App\Form\RessourcesType;
use App\Form\SearchRessourcesType;
use App\Repository\ZoneRepository;
use App\Entity\RessourcesMinerales;
use App\Repository\EtapeRepository;
use App\Repository\StatutRepository;
use App\Repository\ElementsRepository;
use App\Repository\CategorieRepository;
use App\Repository\TypologieRepository;
use App\Repository\NomFeuilletRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\RessourcesMineralesRepository;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RessourcesMineralesController extends AbstractController
{
    /**
     * @Route("/RessourcesMinerales", name="ressources")
     */
    public function index(Request $request ,RessourcesMineralesRepository $repo,ContainerInterface $container,
    ZoneRepository $repo_zone,NomFeuilletRepository $repo_nom,EtapeRepository $repo_etape,
    CategorieRepository $repo_cat,StatutRepository $repo_statut,TypologieRepository $repo_typologie,
    ElementsRepository $repo_elements)
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        if($this->getUser()->getActivated() == 0){
            return $this->redirectToRoute('home');
        } 

        $array_nom = $repo_nom->findAll();
        $array_zone = $repo_zone->findAll();
        $array_etape = $repo_etape->findAll();
        $array_cat = $repo_cat->findAll();
        $array_statut = $repo_statut->findAll();
        $array_typologie = $repo_typologie->findAll();
        $array_elements = $repo_elements->findAll();

        $documents = $repo->findAll();
        $doc= new RessourcesMinerales();

        $form = $this->createForm(SearchRessourcesType::class ,$doc );
        $form->handleRequest($request);

        
        $cmp =0;
       $year =  $doc->anneee();
       
       if($form->isSubmitted() && $form->isValid()){
           
        $array = [
        "numeroFeuillet" => $request->request->get("num_feuillet") ,
        "zone" => $request->request->get("zone") ,
        "coordonneX" => $request->request->get("cor_x") ,
        "coordonneY" => $request->request->get("cor_y"),
        "nomFeuillet" => $request->request->get("nom_f") ,
        "identifiant" => $request->request->get("identifiant"),
        "nom" => $request->request->get("nom"),
        "etape" => $request->request->get("etape"),
        "categorie" => $request->request->get("cat"),
        "typologie" => $request->request->get("typologie"),
        "annee" => $request->request->get("annee"),
        "statut" => $request->request->get("statut"),
        "elementChimique" => $request->request->get("element") ,
        "teneur" => $request->request->get("teneur") ,
        "lithologie" => $request->request->get("lithologie") 
              ];
      
      $filtered = array_filter($array , function($val){
          return $val != ""  ;
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
        return $this->render('ressources_minerales/index.html.twig', [
            'form' => $form->createView(),
            'documents' => $result,
            'count' => $cmp,
            'years' => $year,
            'noms' => $array_nom,
            'zones'=> $array_zone,
            'etape'=> $array_etape,
            'cat'=> $array_cat,
            'statut'=> $array_statut ,
            'typologie'=> $array_typologie,
            'elements'=> $array_elements            
        ]);
    }

    /**
     * @Route("/RessourcesMinerales/NewRessource", name="new_ressources")
     */
    public function create(Request $request , ObjectManager $manager,
    ZoneRepository $repo_zone,NomFeuilletRepository $repo_nom,EtapeRepository $repo_etape,
    CategorieRepository $repo_cat,StatutRepository $repo_statut,TypologieRepository $repo_typologie,
    ElementsRepository $repo_elements)
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        if($this->getUser()->getProfile()->getId() == 1){
            return $this->redirectToRoute('authentication');
        }
        $array_nom = $repo_nom->findAll();
        $array_zone = $repo_zone->findAll();
        $array_etape = $repo_etape->findAll();
        $array_cat = $repo_cat->findAll();
        $array_statut = $repo_statut->findAll();
        $array_typologie = $repo_typologie->findAll();
        $array_elements = $repo_elements->findAll();
        

        $document = new RessourcesMinerales();
        $form = $this->createForm(RessourcesType::class ,$document);
        $form->handleRequest($request);
        $year =  $document->anneee();
        if($form->isSubmitted() && $form->isValid()){

            
            
            $document->setZone( $request->request->get("zone"));
            $document->setNumeroFeuillet($request->request->get("num_feuillet"));
            $document->setIdentifiant($request->request->get("identifiant"));
            $document->setCoordonneX($request->request->get("cor_x"));
            $document->setCoordonneY($request->request->get("cor_y"));
            $document->setNom($request->request->get("nom"));
            $document->setEtape($request->request->get("etape"));
            $document->setCategorie($request->request->get("cat"));
            $document->setTypologie($request->request->get("typologie"));
            $document->setAnnee($request->request->get("annee"));
            $document->setStatut($request->request->get("statut"));
            $document->setElementChimique($request->request->get("element"));
            $document->setTeneur($request->request->get("teneur"));
            $document->setLithologie($request->request->get("lithologie"));
            $document->setNomFeuillet($request->request->get("nom_f"));
            

            /*------------ File -------------*/
            $file = $document->getfileName();
            $fileName = md5(uniqid()).'.'.$file->guessExtension();
            $file->move($this->getParameter('upload_directory'),$fileName);
            $document->setfileName($fileName);

            $manager->persist($document);
            $manager->flush();

            return $this->redirectToRoute('ressources'); 

        } 
        

        return $this->render('document/NewRessource.html.twig',[
            'formDocument' => $form->createView(),
            'years' => $year,
            'noms' => $array_nom,
            'zones'=> $array_zone,
            'etape'=> $array_etape,
            'cat'=> $array_cat,
            'statut'=> $array_statut ,
            'typologie'=> $array_typologie,
            'elements'=> $array_elements 
        ]);
    }
}
