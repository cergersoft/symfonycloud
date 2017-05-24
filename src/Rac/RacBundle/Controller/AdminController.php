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
  
  public function addAction(Request $request)
  {
      
      // paginador
      
      $em = $this->getDoctrine()->getManager();
        //$users = $mer->getRepository('merchus2UserBundle:user')->findAll();
        
        $sql="SELECT u FROM RacRacBundle:User u ORDER BY u.id DESC";
        $users=$em->createQuery($sql);
        
        //codigo para paginacion
        $paginator=$this->get('knp_paginator');
        $pagination=$paginator->paginate(
        $users, $request->query->getInt('page', 1),
        5
                );
      
      // paginador
      
    $user = new user();
    $form = $this->createCreateForm($user);
     
    return $this->render('RacRacBundle:Admin:add.html.twig', array('pagination' => $pagination, 'form' => $form->createView()));  
  }
  
  public function createAction(Request $request)
    {
        $user = new user();
        
        $form=$this->createCreateForm($user);
        $form->handleRequest($request);
    
        if($form->isValid()) {
           
           
           $user->setRole('ROLE_USER');
           $em = $this->getDoctrine()->getManager();
           $em->persist($user);
           $em->flush();
           
           $successalertadd = $this -> get('translator')->trans('The User has been register he success.');
           $this->addFlash('alertadd', $successalertadd);
           
           return $this->redirectToRoute('rac_rac_add');

             
        }
        
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
