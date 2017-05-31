<?php

namespace Rac\RacBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Rac\RacBundle\Entity\GcaBundle;
use Rac\RacBundle\Form\GcaBundleType;

class GcaController extends Controller
{
//funciones publicas 
    
    public function homeAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        
        $sql="SELECT u FROM RacRacBundle:GcaBundle u ORDER BY u.id DESC";
        
        $user = $em->createQuery($sql);
        
        // paginador
        
        $paginator=$this->get('knp_paginator');
        $pagination=$paginator->paginate(
        $user, $request->query->getInt('page', 1),
        5
         );
        
        // paginador
        
        return $this->render('RacRacBundle:Gcsa:gcahome.html.twig', array('pagination' => $pagination));
    }
    
    
    public function addAction()
    {
        $Gca = new GcaBundle();
        $form = $this->createCreateForm($Gca);
        
        return $this->render('RacRacBundle:Gcsa:gcaadd.html.twig', array('form' => $form->createView()));
    }
    
    
    public function createAction(Request $request)
    {
        $gca= new GcaBundle();
        $form = $this->createCreateForm($gca);
        $form->handleRequest($request);
        
        if($form->isValid())
        {
           
            $gca->setPhoto('user.png');
            $gca->setBalances(0000);
            $em = $this->getDoctrine()->getManager();
            $em->persist($gca);
            $em->flush();
            
            $this->addFlash('alertadd', 'The Friend has been register he success.');
            
            return $this->redirectToRoute('rac_Gca_add');
            
        }
        return $this->render('RacRacBundle:Gcsa:gcaadd.html.twig', array('form' => $form->createView()));
    }
    
    
   public function viewAction($id)
   {
       $reposity = $this->getDoctrine()->getRepository('RacRacBundle:GcaBundle');
       $gca=$reposity->find($id);
       
       $deleteForm=$this->createCustomForm($gca->getId(), 'DELETE', 'rac_Gca_delete');
       return $this->render('RacRacBundle:Gcsa:gcaview.html.twig', array('user' => $gca, 'delete_form' => $deleteForm->createView()));
   }
   
   
   public function editAction($id)
   {
       $emm = $this->getDoctrine()->getRepository('RacRacBundle:GcaBundle');
       $gca= $emm->find($id);
       
       $form = $this->createEditForm($gca);
       return $this->render('RacRacBundle:Gcsa:gcaedit.html.twig', array('user' => $gca, 'form'=>$form->createView()));
   }
   
   
   public function updateAction($id, Request $request)
   {
      
       $em = $this->getDoctrine()->getManager();
       $update = $em->getRepository('RacRacBundle:GcaBundle')->find($id);
       
       $form = $this->createEditForm($update);
       $form->handleRequest($request);
       
      if($form->isSubmitted() && $form->isValid())
      {
          $em->flush();
          $this->addFlash('alertedit', 'Successfully Updated User');
          return $this->redirectToRoute('rac_Gca_homepage');
      }
       
      return $this->render('RacRacBundle:Gcsa:gcahome.html.twig', array('user' => $update));
       
   }
   
   
   public function deleteAction(Request $request, $id)
   {
       $emm = $this->getDoctrine()->getManager();
       $borrar = $emm->getRepository('RacRacBundle:GcaBundle')->find($id);
       
       $form=$this->createCustomForm($borrar->getId(), 'DELETE', 'rac_Gca_delete');
       $form->handleRequest($request);
       
       if($form->isSubmitted() && $form->isValid())
       {
           $emm->remove($borrar);
           $emm->flush();
           
           $this->addFlash('alertdang', 'Successfully deleted User');
          return $this->redirectToRoute('rac_Gca_homepage');
           
       }
   }
    
    
//funciones privadas
    
    private function createCreateForm(GcaBundle $entity)
    {
        $form = $this->createForm(new GcaBundleType(), $entity, array(
                'action' => $this->generateUrl('rac_Gca_create'),
                'method' => 'POST'
            ));
        return $form;
    }
    
    private function createEditForm(GcaBundle $entity)
    {
        $form = $this->createForm(new GcaBundleType(), $entity, array(
                'action' => $this->generateUrl('rac_Gca_update', array('id' => $entity->getId())),
                'method' => 'PUT'
            ));
        return $form;
    }
    
    
    private function createCustomForm($id, $method, $route)
    {
        return $this->createFormBuilder()
        ->setAction($this->generateUrl($route, array('id' => $id)))
        ->setMethod($method)
        ->getForm();
    }
    
// fin de controlador 
}
