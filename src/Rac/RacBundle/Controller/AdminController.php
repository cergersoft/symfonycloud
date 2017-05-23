<?php

namespace Rac\RacBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Rac\RacBundle\Entity\User;
use Rac\RacBundle\Form\UserType;

class AdminController extends Controller
{
    
  public function homeAction()
  {
  return $this->render('RacRacBundle:Admin:home.html.twig');
  }
  
  // funcion agregar 
  
  public function addAction()
  {
    $user = new user();
    $form = $this->createCreateForm($user);
     
    return $this->render('RacRacBundle:Admin:add.html.twig', array('form' => $form->createView()));  
  }
  
  
  // funciones privadas
  
  private function createCreateForm(user $entity)
    {
        $form = $this->createForm(new UserType(), $entity, array(
                'action' => $this->generateUrl('rac_rac_create'),
                'method' => 'POST'
            ));
        return $form;
    }
    
  
  
}
