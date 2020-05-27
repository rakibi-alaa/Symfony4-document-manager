<?php

namespace App\Controller;

use App\Entity\MineralAnalyse;
use App\Entity\MaterialAnalyse;
use App\Entity\SystemIsoptique;
use App\Repository\MaterialAnalyseRepository;
use App\Repository\SystemIsoptiqueRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;


class AdministrationChronoController extends AbstractController
{
    /**
     * @Route("/administration/GeoChrono", name="admin_chrono")
     */
    public function index(ContainerInterface $container,Request $request ,
    SystemIsoptiqueRepository $repo_system,MaterialAnalyseRepository $repo_material)
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        if($this->getUser()->getProfile()->getId() == 1){
            return $this->redirectToRoute('authentication');
        } 
        // Chargement de tout les tables
            //system Isoptique :
            $array_system = $repo_system->findAll();
            //Material Analysé :
            $array_material = $repo_material->findAll();

                //Pagination des table 
        $paginator = $container->get('knp_paginator');

        $systems =  $paginator->paginate(
            $array_system,
            $request->query->getInt('system_p',1),
            $request->query->getInt('limit',6),
            [
                'pageParameterName' => 'system_p'
            ]
        );

        $materials =  $paginator->paginate(
            $array_material,
            $request->query->getInt('mat_p',1),
            $request->query->getInt('limit',6),
            [
                'pageParameterName' => 'mat_p'
            ]
        );

        return $this->render('administration/geochrono.html.twig', [
            'systems' => $systems,
            'materials' => $materials
        ]);
    }

    /************/////// Système isotopique ///////////**********/

    /**
     * @Route("/administration/GeoChrono/DeleteSystem/{id}", name="delete_system")
     */
    public function delete_system(SystemIsoptique $system ,ObjectManager $manager)
    {
         
        $manager->remove($system);
        $manager->flush();
        return $this->redirectToRoute('admin_chrono');
    }
    /**
     * @Route("/administration/GeoChrono/NewSystem", name="add_system")
     */
    public function add_system(Request $request,ObjectManager $manager)
    {
       
        $system = new SystemIsoptique();
        $system->setLibelle($request->request->get("add_system"));

        $manager->persist($system);
        $manager->flush();
        return $this->redirectToRoute('admin_chrono');
    }

    /************/////// Matétiel ou minéral analysé ///////////**********/

    /**
     * @Route("/administration/GeoChrono/DeleteMaterial/{id}", name="delete_material")
     */
    public function delete_material(MaterialAnalyse $material ,ObjectManager $manager)
    {
        
        $manager->remove($material);
        $manager->flush();
        return $this->redirectToRoute('admin_chrono');
    }
    /**
     * @Route("/administration/GeoChrono/NewMaterial", name="add_material")
     */
    public function add_material(Request $request,ObjectManager $manager)
    {
        
        $material = new MaterialAnalyse();
        $material->setLibelle($request->request->get("add_material"));

        $manager->persist($material);
        $manager->flush();
        return $this->redirectToRoute('admin_chrono');
    }

    

}
