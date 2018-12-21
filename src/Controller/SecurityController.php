<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

use App\Entity\User;
use App\Form\UserType;

class SecurityController extends AbstractController
{

/**
 *  @Route("/index")
 */


    /**
     *  @Route("/inscription", name="inscription")
     */

     public function inscription(Request $request, UserPasswordEncoderInterface $passwordEncoder){

        $user = new User();

        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $hash = $passwordEncoder->encodePassword($user, $user->getPassword());
            $user->setPassword($hash);
           
            $em = $this->getDoctrine()
                       ->getManager();
            $em->persist($user);
            $em->flush();

            $token = new UsernamePasswordToken(
              $user,
              $hash,
              'main',
              $user->getRoles()
              
          );alert('on passe?');

          $this->get('security.token_storage')->setToken($token);
          $this->get('session')->set('_security_main', serialize($token));

          $this->addFlash('success', 'You are now successfully registered!');

           //retour a l'acceuil
           return $this->redirectToRoute('creation');
       }

        

        return $this->render('security/inscription.html.twig', 
        array('title' => 'Inscription',
                    'form'  => $form->createview()));
    
    }

      /**
    * @Route("/login", name="login")
    */
    public function login(Request $request, AuthenticationUtils $authUtils)
    {
    
    	$error = $authUtils->getLastAuthenticationError();
    	//dernier utilisateur saisi
    	$lastUsername = $authUtils->getLastUsername();
    	//template
    	return $this->render('security/login.html.twig',
    									array('title' => 'Connexion',
    												'error' => $error,
    												'last_username' => $lastUsername));
    }


  // mail confirmation
    public function index($name, \Swift_Mailer $mailer)
{
    $message = (new \Swift_Message('Hello Email'))
        ->setFrom('marcmontgne@gmail.com')
        ->setTo('marcmontagne@gmail.com')
        ->setBody(
            $this->renderView(
                // templates/emails/registration.html.twig
                'security/registration.html.twig',
                array('name' => $name)
            ),
            'text/html');

        $mailer->send($message);

        return $this->render('security/registration.html.twig');
    }


     
}
