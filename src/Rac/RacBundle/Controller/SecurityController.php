<?php

namespace Rac\RacBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SecurityController extends Controller
{
    // funcion de login 
   public function loginAction()
    {
      
       $authenticationUtils = $this->get('security.authentication_utils');

      $error = $authenticationUtils->getLastAuthenticationError();

      $lastUsername = $authenticationUtils->getLastUsername();

      return $this->render('RacRacBundle:Security:login.html.twig', array('last_username' => $lastUsername, 'error' => $error));
    }
    
   public function login_check()
   {
       
   }
    
// fin del controlador
}
