<?php

namespace Dam\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{
  // funciones publicas 
    
    
  public function homeAction()
  {
  return $this->render('DamUserBundle:plantillas:index.html.twig');
  }
  
  // funcion agregar 
  
  public function addAction()
  {
      
  }
  
  
  // funciones privadas
  
}
