<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class AuthenticationController extends AbstractController
{
    
     /**
     * @Route("/", name="home")
     */
    public function home()
    {
        return $this->render('authentication/home.html.twig');
    }
    
    /**
     * @Route("/authentication", name="authentication")
     */
    public function login(AuthenticationUtils $authenticationUtils)
    {
        // get the login error if there is one
    $error = $authenticationUtils->getLastAuthenticationError();

    // last username entered by the user
    $lastUsername = $authenticationUtils->getLastUsername();

    return $this->render('authentication/login.html.twig', array(
        'last_username' => $lastUsername,
        'error'         => $error,
    ));
        
    }
    /**
     * @Route("/deconnexion", name="deconnexion")
     */
    public function logout()
    {

    }

    /**
     * @Route("/inscription", name="user_new")
     */
    public function create(Request $request , ObjectManager $manager, UserPasswordEncoderInterface $encoder)
    {
        $user = new User();
        $form = $this->createForm(UserType::class,$user);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $hash = $encoder->encodePassword($user , $user->getPassword());
            $user->setPassword($hash);
            
            $manager->persist($user);
            $manager->flush();

            return $this->redirectToRoute('authentication');
        }

        return $this->render('authentication/inscription.html.twig', [
            'formUser' => $form->createView()
        ]);
    }
}
