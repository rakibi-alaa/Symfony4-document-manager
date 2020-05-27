<?php

namespace App\Controller;

use App\Entity\ObjetAnalyse;
use App\Entity\MethodeAnalyse;
use App\Entity\MineralAnalyse;
use App\Entity\ElementChimique;
use App\Repository\ObjetAnalyseRepository;
use App\Repository\MethodeAnalyseRepository;
use App\Repository\MineralAnalyseRepository;
use App\Repository\ElementChimiqueRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdministrationChimieController extends AbstractController
{
    /**
     * @Route("/administration/GeoChimie", name="admin_chimie")
     */
    public function index(ContainerInterface $container,Request $request ,
    ObjetAnalyseRepository $repo_objet,MineralAnalyseRepository $repo_mineral,
    ElementChimiqueRepository $repo_element , MethodeAnalyseRepository $repo_methode)
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        if($this->getUser()->getProfile()->getId() == 1){
            return $this->redirectToRoute('authentication');
        } 
        // Chargement de tout les tables
            //Objet Analyse :
        $array_objet = $repo_objet->findAll();
            //Mineral Analyse :
        $array_mineral = $repo_mineral->findAll();
            //Element Chimique :
        $array_element = $repo_element->findAll();
            //Methode Analyse :
        $array_methode = $repo_methode->findAll();


            //Pagination des table 
        $paginator = $container->get('knp_paginator');

        $objets =  $paginator->paginate(
            $array_objet,
            $request->query->getInt('objet_p',1),
            $request->query->getInt('limit',6),
            [
                'pageParameterName' => 'objet_p'
            ]
        );

        $minerales =  $paginator->paginate(
            $array_mineral,
            $request->query->getInt('mineral_p',1),
            $request->query->getInt('limit',6),
            [
                'pageParameterName' => 'mineral_p'
            ]
        );
        $elements =  $paginator->paginate(
            $array_element,
            $request->query->getInt('element_p',1),
            $request->query->getInt('limit',6),
            [
                'pageParameterName' => 'element_p'
            ]
        );
        $methodes =  $paginator->paginate(
            $array_methode,
            $request->query->getInt('methode_p',1),
            $request->query->getInt('limit',6),
            [
                'pageParameterName' => 'methode_p'
            ]
        );

        return $this->render('administration/geochimie.html.twig', [
            'objets' => $objets,
            'minerales' => $minerales,
            'elements' => $elements,
            'methodes' => $methodes
        ]);
    }

    /************/////// Objet Analyse ///////////**********/

    /**
     * @Route("/administration/GeoChimie/DeleteObjet/{id}", name="delete_objet")
     */
    public function delete_objet(ObjetAnalyse $objet ,ObjectManager $manager)
    {
        
        $manager->remove($objet);
        $manager->flush();
        return $this->redirectToRoute('admin_chimie');
    }
    /**
     * @Route("/administration/GeoChimie/NewObjet", name="add_objet")
     */
    public function add_objet(Request $request,ObjectManager $manager)
    {
        $objet = new ObjetAnalyse();
        $objet->setLibelle($request->request->get("add_objet"));

        $manager->persist($objet);
        $manager->flush();
        return $this->redirectToRoute('admin_chimie');
    }

    /************/////// Minerale Analyse ///////////**********/

    /**
     * @Route("/administration/GeoChimie/DeleteMineral/{id}", name="delete_mineral")
     */
    public function delete_mineral(MineralAnalyse $mineral ,ObjectManager $manager)
    {
        $manager->remove($mineral);
        $manager->flush();
        return $this->redirectToRoute('admin_chimie');
    }
    /**
     * @Route("/administration/GeoChimie/NewMineral", name="add_mineral")
     */
    public function add_mineral(Request $request,ObjectManager $manager)
    {
        $mineral = new MineralAnalyse();
        $mineral->setLibelle($request->request->get("add_mineral"));

        $manager->persist($mineral);
        $manager->flush();
        return $this->redirectToRoute('admin_chimie');
    }

    /************/////// Element Chimique ///////////**********/

    /**
     * @Route("/administration/GeoChimie/DeleteElement/{id}", name="delete_element")
     */
    public function delete_element(ElementChimique $element ,ObjectManager $manager)
    {
        $manager->remove($element);
        $manager->flush();
        return $this->redirectToRoute('admin_chimie');
    }
    /**
     * @Route("/administration/GeoChimie/NewElement", name="add_element")
     */
    public function add_element(Request $request,ObjectManager $manager)
    {
        $element = new ElementChimique();
        $element->setLibelle($request->request->get("add_element"));

        $manager->persist($element);
        $manager->flush();
        return $this->redirectToRoute('admin_chimie');
    }



    /************/////// Methode Analyse ///////////**********/

    /**
     * @Route("/administration/GeoChimie/DeleteMethode/{id}", name="delete_methode")
     */
    public function delete_methode(MethodeAnalyse $methode ,ObjectManager $manager)
    {
        $manager->remove($methode);
        $manager->flush();
        return $this->redirectToRoute('admin_chimie');
    }
    /**
     * @Route("/administration/GeoChimie/NewMethode", name="add_methode")
     */
    public function add_methode(Request $request,ObjectManager $manager)
    {
        $methode = new MethodeAnalyse();
        $methode->setLibelle($request->request->get("add_methode"));

        $manager->persist($methode);
        $manager->flush();
        return $this->redirectToRoute('admin_chimie');
    }
    
}
