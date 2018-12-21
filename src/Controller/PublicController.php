<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

use App\Entity\User;




class PublicController extends AbstractController
{
    /**
     * @Route("/public", name="public")
     */
    public function public()
    {
        return $this->render('public/index.html.twig', [
            'title' => 'Salut'
        ]);
    }

      /**
      * @Route("/contact", name="contact")
      */
      public function contact(Request $request){

        $defaultData = array();
        $form = $this->createFormBuilder($defaultData)
                     ->add('nom', TextType::class)
                     ->add('email', EmailType::class)
                     ->add('message', TextareaType::class)
                     ->getForm();

        // recuperation des donné 
        $form->handleRequest($request);

        if($form->isSubmitted() && $form ->isValid()){

            // envoi formulaire 
        }

        return $this->render('public/contact.html.twig', 
                      array('title' => 'Contactez nous', 
                       'form' => $form->createView()));

    }


}