<?php

namespace Rac\RacBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Rac\RacBundle\Entity\Gnj;
use Rac\RacBundle\Form\GnjType;

class GnjController extends Controller
{
    
    public function gnjhomeAction(Request $request)
    {
      // paginador
      
      $em = $this->getDoctrine()->getManager();
        
        $sql="SELECT u FROM RacRacBundle:Gnj u ORDER BY u.id DESC";
        $users=$em->createQuery($sql);
        
        //codigo para paginacion
        $paginator=$this->get('knp_paginator');
        $pagination=$paginator->paginate(
        $users, $request->query->getInt('page', 1),
        6
                );
      
      // paginador
        
        
       return $this->render('RacRacBundle:Ganj:gnjhome.html.twig', array('pagination' => $pagination)); 
    }
    
    
// funcion crear usuario
    
  public function gnjaddAction()
  {
   
    $Gnj = new Gnj();
    $form = $this->createCreateForm($Gnj);
     
    return $this->render('RacRacBundle:Ganj:gnjadd.html.twig', array('form' => $form->createView()));  
  }
  
  
  
  public function gnjcreateAction(Request $request)
    {
        $Gnj = new Gnj();
        
        $form=$this->createCreateForm($Gnj);
        $form->handleRequest($request);
    
        if($form->isValid()) {
            
            // subir imagen
            /*
            $file=$form["photo"]->getData();
            $ext=$file->getExtension();
            $file_name=time().".".$ext;
            $file->move('uploads', $file_name);
            */
            // subir imagen
           
           $Gnj->setPhoto('user.png');
           $em = $this->getDoctrine()->getManager();
           $em->persist($Gnj);
           $em->flush();
           
           $this->addFlash('alertadd', 'The User has been register he success.');
           
           return $this->redirectToRoute('rac_Gnj_add');

             
        }
        
        return $this->render('RacRacBundle:Ganj:gnjadd.html.twig', array('form' => $form->createView()));
        
    }
    
// funcion ver usuario en especifico
    
    public function gnjviewAction($id)
    {
        
        $repositori = $this->getDoctrine()->getRepository('RacRacBundle:Gnj');
        $gnj = $repositori->find($id);
        
        if(!$gnj)
      {
          throw $this->createNotFoundException('Usuario no Encontrado');
      }
        
        return $this->render('RacRacBundle:Ganj:gnjview.html.twig',  array('user'=> $gnj));
    }
    
    
// funcion editar un usuario
  
  public function gnjeditAction($id)
    {
      $em = $this->getDoctrine()->getManager();
      $gnj = $em->getRepository('RacRacBundle:Gnj')->find($id);
      
      if(!$gnj)
      {
          throw $this->createNotFoundException('Usuario no Encontrado');
      }
      
     
      $form = $this->createEditForm($gnj);
      return $this->render('RacRacBundle:Ganj:gnjedit.html.twig', array('gnj'=> $gnj, 'form' => $form->createView()));
      
    }
    
    
    
 public function gnjupdateAction($id, Request $request)
    {
     $em = $this->getDoctrine()->getManager();
     $gnj=$em->getRepository('RacRacBundle:Gnj')->find($id);
     
     if(!$gnj)
      {
          throw $this->createNotFoundException('Usuario no Encontrado');
      }
      
      $form=$this->createEditForm($gnj);
      $form->handleRequest($request);

      if($form->isSubmitted() && $form->isValid())
      {
           
        $em->flush();
        $this->addFlash('alertadd', 'User has been success modified.');
        return $this->redirectToRoute('rac_Gnj_edit', array('id' => $gnj->getId() ));
      }
      return $this->render('RacRacBundle:Ganj:gnjedit.html.twig', array('gnj'=> $gnj, 'form' => $form->createView()));
    }
    
    
  
  
  
  // funciones privadas
    
 private function createEditForm(Gnj $entity)
    {
        $form = $this->createForm(new GnjType(), $entity, array(
            'action' => $this->generateUrl('rac_Gnj_update', array(
            'id' => $entity->getId())), 
            'method' => 'PUT'
            ));
        return $form;       
    }
  
  private function createCreateForm(Gnj $entity)
    {
        $form = $this->createForm(new GnjType(), $entity, array(
                'action' => $this->generateUrl('rac_Gnj_create'),
                'method' => 'POST'
            ));
        return $form;
    }
    
    
     
    
 // fin de controlador 
}
