<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use  Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle \Controller\Controller;
use  Symfony\Component\HttpFoundation\Response ;
use Symfony\Component\Asset\PathPackage;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

use App\Entity\Events ;





class EventController extends AbstractController
{
    /**
     * @Route("/home", name="home_page")
     */
    

public function showAction()
   {

       
       
      
 $events = $this->getDoctrine()->getRepository('App:Events')->findAll();
       
       
       
     
       return $this->render('event/index.html.twig', array('events'=>$events));
// we send the result (the variable that have the result of bringing all info from our database) to the index.html.twig page
   }   

/**
     * @Route("/show/{id}", name="event_show")
     */



public function show($id)
   {

       
       
      
 $events = $this->getDoctrine()->getRepository('App:Events')->find($id);

  if (!$events) {
        throw $this->createNotFoundException(
            'No events found for id '.$id
        );
    }
       
       
       
     return $this->render('event/show.event.html.twig', array('events'=>$events));
       
// we send the result (the variable that have the result of bringing all info from our database) to the index.html.twig page
   }  


}












