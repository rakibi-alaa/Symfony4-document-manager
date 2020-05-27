<?php

namespace App\Controller;

use App\Form\DocChimieType;
use App\Entity\DocumentChimie;
use App\Form\SearchChimieType;
use App\Repository\ZoneRepository;
use App\Repository\NomFeuilletRepository;
use App\Repository\ObjetAnalyseRepository;
use App\Repository\DocumentChimieRepository;
use App\Repository\MethodeAnalyseRepository;
use App\Repository\MineralAnalyseRepository;
use App\Repository\ElementChimiqueRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ChimieDocController extends AbstractController
{
    /**
     * @Route("/GeoChimie", name="geochimie")
     */
    public function index(Request $request ,DocumentChimieRepository $repo,
    ZoneRepository $repo_zone,NomFeuilletRepository $repo_nom,ObjetAnalyseRepository $repo_objet,
    MineralAnalyseRepository $repo_mineral,ElementChimiqueRepository $repo_element,
    MethodeAnalyseRepository $repo_methode)
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        if($this->getUser()->getActivated() == 0){
            return $this->redirectToRoute('home');
        } 

        $array_zone = $repo_zone->findAll();
        $array_nom = $repo_nom->findAll();
        $array_objet = $repo_objet->findAll();
        $array_mineral = $repo_mineral->findAll();
        $array_element = $repo_element->findAll();
        $array_methode = $repo_methode->findAll();

        $documents = $repo->findAll();
        $doc= new DocumentChimie();
        

         $form = $this->createForm(SearchChimieType::class ,$doc );

        $form->handleRequest($request);

        

        $cmp = 0;

        if($form->isSubmitted() && $form->isValid()){
           
            $array = [
                "numeroFeuillet" => $request->request->get("num_feuillet") ,
                "zone" => $request->request->get("zone") ,
                "identifiant" => $request->request->get("identifiant") ,
                "coordonneX" => $request->request->get("cor_X") ,
                "coordonneY" => $request->request->get("cor_y"),
                "objetAnalyse" =>$request->request->get("objetAnalyse") ,
                "mineralAnalyse" => $request->request->get("mineralAnalyse") ,
                "teneur" =>  $request->request->get("teneur") ,
                "methodeAnalyse" =>  $request->request->get("methodeAnalyse"),
                "NomRoche" =>  $request->request->get("nomRoche"),
                "elementChimique" =>  $request->request->get("elementChimique"),
                "nomFeuillet" => $request->request->get("nom")
                    ];
            
            $filtered = array_filter($array , function($val){
                return $val != "";
            });
             
           
            
           $documents = $repo->findBy($filtered);
           if(count($filtered) == 0 || count($documents) == 0) {
               $cmp = 1;
           }
        }

        if( count($documents) == 0) {$cmp = 1;}

        return $this->render('chimie_doc/index.html.twig',[
            'form' => $form->createView(),
            'documents' => $documents,
            'count' => $cmp,
            'noms' => $array_nom,
            'zones' => $array_zone,
            'objets' => $array_objet,
            'minerales' => $array_mineral,
            'elements' => $array_element,
            'methodes' => $array_methode
        ]);
    }
    /**
     * @Route("/GeoChimie/NewDoc", name="new_DocChimie")
     */
    public function create(Request $request , ObjectManager $manager,
    ZoneRepository $repo_zone,NomFeuilletRepository $repo_nom,ObjetAnalyseRepository $repo_objet,
    MineralAnalyseRepository $repo_mineral,ElementChimiqueRepository $repo_element,
    MethodeAnalyseRepository $repo_methode)
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        if($this->getUser()->getProfile()->getId() == 1){
            return $this->redirectToRoute('authentication');
        } 
        
        $array_zone = $repo_zone->findAll();
        $array_nom = $repo_nom->findAll();
        $array_objet = $repo_objet->findAll();
        $array_mineral = $repo_mineral->findAll();
        $array_element = $repo_element->findAll();
        $array_methode = $repo_methode->findAll();

        $document = new DocumentChimie();
        $form = $this->createForm(DocChimieType::class ,$document);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

           
            
            $document->setZone( $request->request->get("zone"));
            $document->setObjetAnalyse($request->request->get("objetAnalyse"));
            $document->setMineralAnalyse($request->request->get("mineralAnalyse"));
            $document->setElementChimique($request->request->get("elementChimique"));
            $document->setMethodeAnalyse($request->request->get("methodeAnalyse"));
            $document->setNomFeuillet($request->request->get("nom"));
            

            /*------------ File -------------*/
            $file = $document->getfileName();
            $fileName = md5(uniqid()).'.'.$file->guessExtension();
            $file->move($this->getParameter('upload_directory'),$fileName);
            $document->setfileName($fileName);

            $manager->persist($document);
            $manager->flush();

            return $this->redirectToRoute('geochimie'); 

        } 
        

        return $this->render('document/NewChimie.html.twig',[
            'formDocument' => $form->createView(),
            'noms' => $array_nom,
            'zones' => $array_zone,
            'objets' => $array_objet,
            'minerales' => $array_mineral,
            'elements' => $array_element,
            'methodes' => $array_methode
        ]);
    }
}
