<?php

namespace App\Controller;

use App\Entity\Zone;
use App\Entity\NomFeuillet;
use App\Entity\TypeDocument;
use App\Repository\ZoneRepository;


use App\Entity\DomaineLithosctructural;
use App\Repository\NomFeuilletRepository;
use App\Repository\TypeDocumentRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\DomaineLithosctructuralRepository;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdministrationController extends AbstractController
{
    /**
     * @Route("/administration", name="administration")
     */
    public function index(ContainerInterface $container,Request $request ,
    NomFeuilletRepository $repo_nom,ZoneRepository $repo_zone )
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        if($this->getUser()->getProfile()->getId() == 1){
            return $this->redirectToRoute('authentication');
        } 
       // Chargement de tout les tables
            //Nom Feuillet :
        $array_nom = $repo_nom->findAll();
            //zone
        $array_zone = $repo_zone->findAll();



            //Pagination des table 
        $paginator_nom = $container->get('knp_paginator');
        $paginator_zone = $container->get('knp_paginator');

        $noms =  $paginator_nom->paginate(
            $array_nom,
            $request->query->getInt('nom_p',1),
            $request->query->getInt('limit',5),
            [
                'pageParameterName' => 'nom_p'
            ]
        );
        $zones =  $paginator_zone->paginate(
            $array_zone,
            $request->query->getInt('zone_p',1),
            $request->query->getInt('limit',3),
            [
                'pageParameterName' => 'zone_p'
            ]
        );

        return $this->render('administration/index.html.twig',[
            'nomfeuillet' => $noms,
            'zones' => $zones
        ]);
    }

    /**
     * @Route("/administratio/DeleteNom/{id}", name="delete_nom")
     */
    public function delete_nom(NomFeuillet $nom ,ObjectManager $manager)
    {
        $manager->remove($nom);
        $manager->flush();
        return $this->redirectToRoute('administration');
    }
    /**
     * @Route("/administratio/NewNom", name="add_nom")
     */
    public function add_nom(Request $request,ObjectManager $manager)
    {
        $nom = new NomFeuillet();
        $nom->setLibelle($request->request->get("add_nom"));

        $manager->persist($nom);
        $manager->flush();
        return $this->redirectToRoute('administration');
    }

    /**
     * @Route("/administratio/DeleteZone/{id}", name="delete_zone")
     */
    public function delete_zone(Zone $zone ,ObjectManager $manager)
    {
        $manager->remove($zone);
        $manager->flush();
        return $this->redirectToRoute('administration');
    }
    /**
     * @Route("/administratio/NewZone", name="add_zone")
     */
    public function add_zone(Request $request,ObjectManager $manager)
    {
        $zone = new Zone();
        $zone->setLibelle($request->request->get("add_zone"));

        $manager->persist($zone);
        $manager->flush();
        return $this->redirectToRoute('administration');
    }

/******************************Geodoc******************************** */

    /**
     * @Route("/administration/Geodoc", name="admin_geodoc")
     */
    public function geodoc(ContainerInterface $container,Request $request ,
    DomaineLithosctructuralRepository $repo_domain,TypeDocumentRepository $repo_type )
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        if($this->getUser()->getProfile()->getId() == 1){
            return $this->redirectToRoute('authentication');
        } 
       // Chargement de tout les tables
            //Domain Lithostructural :
        $array_domain = $repo_domain->findAll();
            //Type Document :
        $array_type = $repo_type->findAll();



            //Pagination des table 
        $paginator = $container->get('knp_paginator');

        $domains =  $paginator->paginate(
            $array_domain,
            $request->query->getInt('domain_p',1),
            $request->query->getInt('limit',6),
            [
                'pageParameterName' => 'domain_p'
            ]
        );
        $types =  $paginator->paginate(
            $array_type,
            $request->query->getInt('type_p',1),
            $request->query->getInt('limit',6),
            [
                'pageParameterName' => 'type_p'
            ]
        );

        return $this->render('administration/geodoc.html.twig',[
            'domains' => $domains,
            'types' => $types
        ]);
    }

    /**
     * @Route("/administration/Geodoc/DeleteDomain/{id}", name="delete_domain")
     */
    public function delete_domain(DomaineLithosctructural $domain ,ObjectManager $manager)
    {
        $manager->remove($domain);
        $manager->flush();
        return $this->redirectToRoute('admin_geodoc');
    }
    /**
     * @Route("/administration/Geodoc/NewDomain", name="add_domain")
     */
    public function add_domain(Request $request,ObjectManager $manager)
    {
        $domain = new DomaineLithosctructural();
        $domain->setLibelle($request->request->get("add_domain"));

        $manager->persist($domain);
        $manager->flush();
        return $this->redirectToRoute('admin_geodoc');
    }

    /**
     * @Route("/administration/Geodoc/DeleteType/{id}", name="delete_type")
     */
    public function delete_type(TypeDocument $type ,ObjectManager $manager)
    {
        $manager->remove($type);
        $manager->flush();
        return $this->redirectToRoute('admin_geodoc');
    }
    /**
     * @Route("/administration/Geodoc/NewType", name="add_type")
     */
    public function add_type(Request $request,ObjectManager $manager)
    {
        $type = new TypeDocument();
        $type->setLibelle($request->request->get("add_type"));

        $manager->persist($type);
        $manager->flush();
        return $this->redirectToRoute('admin_geodoc');
    }

}
