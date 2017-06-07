<?php

namespace Rac\RacBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Rac\RacBundle\Entity\Assistance;
use Rac\RacBundle\Form\AssistanceType;

class AssistanceController extends Controller
{
    
    
   
   
   public function assistenceAction(Request $request)
    {
      // paginador
      
      $em = $this->getDoctrine()->getManager();
        
        $sql="SELECT u FROM RacRacBundle:Assistance u ORDER BY u.id DESC";
        $users=$em->createQuery($sql);
        
        //codigo para paginacion
        $paginator=$this->get('knp_paginator');
        $pagination=$paginator->paginate(
        $users, $request->query->getInt('page', 1),
        6
         );
      
        // paginador
       
       return $this->render('RacRacBundle:Assistance:assistence.html.twig', array('pagination' => $pagination)); 
    }
    
    
    public function createAction()
    {
        
    }
    
    
// functions privated
    
    private function createCreateForm(Assistance $entity)
    {
        $form = $this->createForm(new AssistanceType(), $entity, array(
                'action' => $this->generateUrl('rac_Assistence_create'),
                'method' => 'POST'
            ));
        return $form;
    }
    
    
}
