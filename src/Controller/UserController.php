<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

//réponse navigateur
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
//sécurité
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
//table client
use App\Entity\User;
// table personnageStat
use App\Entity\PlayerStats;
// formulaire inscription
use App\Form\UserType;

class UserController extends AbstractController
{
    /**
     * @Route("/index", name="index")
     */
    public function index()
    {
        return $this->render('user/index.html.twig', [
            'title' => 'index'
        ]);
    }

    /**
     * @Route("/inscription", name="inscription")
     */
    public function signIn(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
         //liaison avec la table clients
         $user = new User();
         //formulaire
         $form = $this->createForm(UserType::class, $user);
         //récupération du formuaire
         $form->handleRequest($request);
         //si soumi et validé
         if($form->isSubmitted() && $form->isvalid()){
             //encodage du mot de passe
             $hash = $passwordEncoder->encodePassword($user, $user->getPassword());
             $user->setPassword($hash);
             //enregistrement en bdd
             $em = $this->getDoctrine()->getManager();
             $em->persist($user);
             $em->flush();
             //retour a l'acceuil
             return $this->redirectToRoute('creation');
         }
         return $this->render('user/inscription.html.twig', array('title'=>'Inscription', 'form'=>$form->createView()));
 
    }

        /**
         * @Route("/login", name="login")
         */
    public function login(Request $request, AuthenticationUtils $authUtils)
    {
        //récup de l'erreur
        $error = $authUtils->getLastAuthenticationError();
        //dernier utilisateur saisi
        $lastUsername = $authUtils->getLastUsername();
        //template
        return$this->render('security/login.html.twig', array('title'=> 'Connexion', 'error' => $error, 'last_username' => $lastUsername));
        
    }

    /**
     * @Route("/creationPersonnage", name="creation")
     */
    public function creation(Request $request)
    {

        

        return $this->render('user/creation.html.twig', array('title'=>'creation de Personnage'));


    }
}