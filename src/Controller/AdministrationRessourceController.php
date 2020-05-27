<?php

namespace App\Controller;

use App\Entity\Etape;
use App\Entity\Statut;
use App\Entity\Elements;
use App\Entity\Categorie;
use App\Entity\Typologie;
use App\Repository\EtapeRepository;
use App\Repository\StatutRepository;
use App\Repository\ElementsRepository;
use App\Repository\CategorieRepository;
use App\Repository\TypologieRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdministrationRessourceController extends AbstractController
{
    /**
     * @Route("/administration/Ressources", name="admin_ressource")
     */
    public function index(ContainerInterface $container,Request $request ,
    EtapeRepository $repo_etape,CategorieRepository $repo_cat,
    TypologieRepository $repo_typo,StatutRepository $repo_statut,ElementsRepository $repo_elements)
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        if($this->getUser()->getProfile()->getId() == 1){
            return $this->redirectToRoute('authentication');
        } 
        // Chargement de tout les tables
            //Etapes :
            $array_etape = $repo_etape->findAll();
            //Catégorie :
        $array_cat = $repo_cat->findAll();
            //Typologie :
        $array_typo = $repo_typo->findAll();
            //Statut :
        $array_statut = $repo_statut->findAll();
            //Elements :
        $array_elements = $repo_elements->findAll();


            //Pagination des table 
        $paginator = $container->get('knp_paginator');

        $etape =  $paginator->paginate(
            $array_etape,
            $request->query->getInt('etape_p',1),
            $request->query->getInt('limit',6),
            [
                'pageParameterName' => 'etape_p'
            ]
        );

        $categorie =  $paginator->paginate(
            $array_cat,
            $request->query->getInt('cat_p',1),
            $request->query->getInt('limit',6),
            [
                'pageParameterName' => 'cat_p'
            ]
        );
        $typologie =  $paginator->paginate(
            $array_typo,
            $request->query->getInt('typo_p',1),
            $request->query->getInt('limit',6),
            [
                'pageParameterName' => 'typo_p'
            ]
        );
        $statut =  $paginator->paginate(
            $array_statut,
            $request->query->getInt('statut_p',1),
            $request->query->getInt('limit',6),
            [
                'pageParameterName' => 'statut_p'
            ]
        );
        $elements =  $paginator->paginate(
            $array_elements,
            $request->query->getInt('elements_p',1),
            $request->query->getInt('limit',6),
            [
                'pageParameterName' => 'elements_p'
            ]
        );


        return $this->render('administration/ressource.html.twig', [
            'etape' => $etape,
            'categorie' => $categorie,
            'typologie' => $typologie,
            'statut' => $statut,
            'elements' => $elements
        ]);
    }


    /************/////// Etape ///////////**********/

    /**
     * @Route("/administration/Ressources/DeleteEtape/{id}", name="delete_etape")
     */
    public function delete_etape(Etape $etape ,ObjectManager $manager)
    {
        $manager->remove($etape);
        $manager->flush();
        return $this->redirectToRoute('admin_ressource');
    }
    /**
     * @Route("/administration/Ressources/NewEtape", name="add_etape")
     */
    public function add_etape(Request $request,ObjectManager $manager)
    {
        $etape = new Etape();
        $etape->setLibelle($request->request->get("add_etape"));

        $manager->persist($etape);
        $manager->flush();
        return $this->redirectToRoute('admin_ressource');
    }

    /************/////// Catgorie ///////////**********/

    /**
     * @Route("/administration/Ressources/DeleteCat/{id}", name="delete_cat")
     */
    public function delete_cat(Categorie $cat ,ObjectManager $manager)
    {
        $manager->remove($cat);
        $manager->flush();
        return $this->redirectToRoute('admin_ressource');
    }
    /**
     * @Route("/administration/Ressources/NewCat", name="add_cat")
     */
    public function add_cat(Request $request,ObjectManager $manager)
    {
        $cat = new Categorie();
        $cat->setLibelle($request->request->get("add_cat"));

        $manager->persist($cat);
        $manager->flush();
        return $this->redirectToRoute('admin_ressource');
    }

    /************/////// Statut ///////////**********/

    /**
     * @Route("/administration/Ressources/DeleteStatut/{id}", name="delete_statut")
     */
    public function delete_statut(Statut $statut ,ObjectManager $manager)
    {
        $manager->remove($statut);
        $manager->flush();
        return $this->redirectToRoute('admin_ressource');
    }
    /**
     * @Route("/administration/Ressources/NewStatut", name="add_statut")
     */
    public function add_statut(Request $request,ObjectManager $manager)
    {
        $statut = new Statut();
        $statut->setLibelle($request->request->get("add_statut"));

        $manager->persist($statut);
        $manager->flush();
        return $this->redirectToRoute('admin_ressource');
    }

    /************/////// Typologie ///////////**********/

    /**
     * @Route("/administration/Ressources/DeleteTypologie/{id}", name="delete_typo")
     */
    public function delete_typo(Typologie $typo ,ObjectManager $manager)
    {
        $manager->remove($typo);
        $manager->flush();
        return $this->redirectToRoute('admin_ressource');
    }
    /**
     * @Route("/administration/Ressources/NewTypologie", name="add_typo")
     */
    public function add_typo(Request $request,ObjectManager $manager)
    {
        $typo = new Typologie();
        dump($request->request->get("add_typo"));
        $typo->setLibelle($request->request->get("add_typo"));

        $manager->persist($typo);
        $manager->flush();
        return $this->redirectToRoute('admin_ressource');
    }

    /************/////// Elements ///////////**********/

    /**
     * @Route("/administration/Ressources/DeleteTElements/{id}", name="delete_elements")
     */
    public function delete_elements(Elements $el ,ObjectManager $manager)
    {
        $manager->remove($el);
        $manager->flush();
        return $this->redirectToRoute('admin_ressource');
    }
    /**
     * @Route("/administration/Ressources/NewElements", name="add_elements")
     */
    public function add_elements(Request $request,ObjectManager $manager)
    {
        $el = new Elements();
        dump($request->request->get("add_el"));
        $el->setLibelle($request->request->get("add_el"));

        $manager->persist($el);
        $manager->flush();
        return $this->redirectToRoute('admin_ressource');
    }

}
