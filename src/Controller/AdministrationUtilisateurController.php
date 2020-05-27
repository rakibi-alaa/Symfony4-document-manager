<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use App\Repository\ProfileRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AdministrationUtilisateurController extends AbstractController
{
    /**
     * @Route("/administration/Users", name="admin_user")
     */
    public function index(ContainerInterface $container,Request $request ,
    UserRepository $repo_user , ProfileRepository $repo_profile,
    ObjectManager $manager, UserPasswordEncoderInterface $encoder)
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        if($this->getUser()->getProfile()->getId() == 1){
            return $this->redirectToRoute('authentication');
        } 

        $array_etudiant = $repo_user->findBy(['profile' => 1 ]);
        $array_enseignant = $repo_user->findBy(['profile' => 2 ]);
        $array_profile = $repo_profile->findAll();


        $paginator = $container->get('knp_paginator');

        $etudiants =  $paginator->paginate(
            $array_etudiant,
            $request->query->getInt('etudiant_p',1),
            $request->query->getInt('limit',5),
            [
                'pageParameterName' => 'etudiant_p'
            ]
        );

        $enseignant =  $paginator->paginate(
            $array_enseignant,
            $request->query->getInt('enseignant_p',1),
            $request->query->getInt('limit',5),
            [
                'pageParameterName' => 'enseignant_p'
            ]
        );
        /*********************Ajout user  **************************/

        $user = new User();
        $form = $this->createForm(UserType::class,$user);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            
            $hash = $encoder->encodePassword($user , $user->getPassword());
            $user->setPassword($hash);
            if ($user->getProfile()->getId() == 2) {
                $user->setActivated(true);
            }
            $manager->persist($user);
            $manager->flush();

            return $this->redirectToRoute('admin_user');
        }

        /***************************End Ajout user */
        return $this->render('administration/users.html.twig', [
            'form' => $form->createView(),
            'etudiants' => $etudiants,
            'enseignant' => $enseignant,
            'profile' => $array_profile,
        ]);
    }

    /**
     * @Route("/administration/Users/delete/{id}", name="delete_user")
     */
    public function delete_user(User $user , ObjectManager $manager){
        $manager->remove($user);
        $manager->flush();
        return $this->redirectToRoute('admin_user');
    }

    /**
     * @Route("/administration/Users/Activate/{id}", name="activate_user")
     */
    public function activate_user(User $user , ObjectManager $manager){
        $user->setActivated(true);
        $manager->flush();
        return $this->redirectToRoute('admin_user');
    }

    /**
     * @Route("/administration/Users/Deactivate/{id}", name="deactivate_user")
     */
    public function deactivate_user(User $user , ObjectManager $manager){
        $user->setActivated(false);
        $manager->flush();
        return $this->redirectToRoute('admin_user');
    }
}
