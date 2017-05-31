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
     
    return $this->render('RacRacBundle:Admin:adminadd.html.twig', array('pagination' => $pagination, 'form' => $form->createView()));  
  }
  
  public function createAction(Request $request)
    {
        $user = new user();
        
        $form=$this->createCreateForm($user);
        $form->handleRequest($request);
    
        if($form->isValid()) {
           
           
           $em = $this->getDoctrine()->getManager();
           $em->persist($user);
           $em->flush();
           
           $successalertadd = $this -> get('translator')->trans('The User has been register he success.');
           $this->addFlash('alertadd', $successalertadd);
           
           return $this->redirectToRoute('rac_rac_add');

             
        }
        
        return $this->render('RacRacBundle:Admin:adminadd.html.twig', array('form' => $form->createView()));
        
    }
  
    public function editAction($id)
    {
        
        $emm = $this->getDoctrine()->getManager();
        $edit = $emm->getRepository('RacRacBundle:User')->find($id);
        
        $form = $this->createEditForm($edit);
        
        return $this->render('RacRacBundle:Admin:adminedit.html.twig', array('user' => $edit, 'form' => $form->createView()));
        
    }
    
    public function viewAction($id)
    {
        $em= $this->getDoctrine()->getRepository('RacRacBundle:User');
        $view = $em->find($id);
        
        if(!$view)
      {
          throw $this->createNotFoundException('Usuario no Encontrado');
      }
        
        return $this->render('RacRacBundle:Admin:adminview.html.twig', array('view' => $view));
        
    }
    
    
    public function updateAction($id, Request $request)
    {
        $emm = $this->getDoctrine()->getManager();
        $update = $emm->getRepository('RacRacBundle:User')->find($id);
        
        $form = $this->createEditForm($update);
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid())
        {
            $password = $form->get('password')->getData();
            
            if(empty($password))
            {
                $recoverpass = $this->recoverPass($id);
                $update->setPassword($recoverpass[0]['password']);
            }
            
            $emm->flush();
            $this->addFlash('alertadd', 'User Successfully Edited');
            return $this->redirectToRoute('rac_rac_add');
        }
      return $this->render('RacRacBundle:Admin:adminadd.html.twig', array('user' => $update));
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
    
    
    private function createEditForm(User $entity)
    {
        $form = $this->createForm(new UserType(), $entity, array(
           'action' => $this->generateUrl('rac_rac_update', array('id' => $entity->getId() )),
            'method' => 'PUT'
        ));
     return $form;
    }

// funcion para recupera password
    
    private function recoverPass($id)
    {
        $emm = $this->getDoctrine()->getManager();
        $query= $emm->createQuery(
                'SELECT p.password
                 FROM RacRacBundle:User p
                 WHERE p.id = :id'
                )->setParameter('id', $id);
        
        $currentPass = $query->getresult();
        
        return $currentPass;
    }
    

      private function deleteUser($role, $em, $user)
    {
        if($role == 'ROLE_USER')
        {
            $em->remove($user);
            $em->flush();
            
            $message = $this->get('The user has been deleted.');
            $removed = 1;
            $alert = 'mensaje';
        }
        
        elseif($role == 'ROLE_ADMIN')
        
        {
            $message = $this->get('Error while trying to delete this user.');
            $removed = 0;
            $alert = 'error';
        } 
        
        elseif($role == 'ROLE_SUADMIN')
        
        {
            $message = $this->get('Error while trying to delete this user.');
            $removed = 0;
            $alert = 'error';  
        }
        
        return array('removed' => $removed, 'message' => $message, 'alert' => $alert);
    }
    
    
    
 // fin del controller
  
}
