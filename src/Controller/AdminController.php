<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use  Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle \Controller\Controller;
use  Symfony\Component\HttpFoundation\Response ;
use Symfony\Component\Asset\PathPackage;


use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;


use App\Entity\Events ;






class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function showAction()
   {

       
       
      
 $events = $this->getDoctrine()->getRepository('App:Events')->findAll();
       
       
       
     
       return $this->render('admin/index.html.twig', array('events'=>$events));
// we send the result (the variable that have the result of bringing all info from our database) to the index.html.twig page
   }   


    /**
    * @Route("/create", name="create_page")
    */
   public function createAction(Request $request)
   {

// Here we create an object from the class that we made
       $events = new Events;
/* Here we will build a form using createFormBuilder and inside this function we will put our object and then we write add then we select the input type then an array to add an attribute that we want in our input field */
       $form = $this->createFormBuilder($events)->add('id', IntegerType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
       ->add('title', TextType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
       ->add('description', TextareaType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
       ->add('venue', TextareaType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
       
   ->add('startTime', DateTimeType::class, array('attr' => array('style'=>'margin-bottom:15px')))
   ->add('save', SubmitType::class, array('label'=> 'Create Events', 'attr' => array('class'=> 'btn-primary', 'style'=>'margin-bottom:15px')))
       ->getForm();
        $form->handleRequest($request);
       
       

       /* Here we have an if statement, if we click submit and if  the form is valid we will take the values from the form and we will save them in the new variables */
       if($form->isSubmitted() && $form->isValid()){
           //fetching data

           // taking the data from the inputs by the name of the inputs then getData() function
           $id = $form['id']->getData();
           $title = $form['title']->getData();
           $description = $form['description']->getData();
           $venue = $form['venue']->getData();
           $due_date = $form['startTime']->getData();
           
           // Here we will get the current date
           $now = new\DateTime('now');

/* these functions we bring from our entities, every column have a set function and we put the value that we get from the form */
           $events->setId($id);
           $events->setTitle($title);
           $events->setDescription($description);
           $events->setVenue($venue);
           $events->setstartTime($startTime);
           $events->setCreateDate($now);
           $em = $this->getDoctrine()->getManager();
           $em->persist($events);
           $em->flush();
           $this->addFlash(
                   'notice',
                   'Events Added'
                   );
           return $this->redirectToRoute('admin');
       }
/* now to make the form we will add this line form->createView() and now you can see the form in create.html.twig file  */
       return $this->render('admin/create.event.html.twig', array('form' => $form->createView()));
   }

      

   /**
    * @Route("/edit/{id}", name="edit_page")
    */
   public function editAction($id, Request $request)
   {
   	/* Here we have a variable todo and it will save the result of this search and it will be one result because we search based on a specific id */
   $events = $this->getDoctrine()->getRepository('App:Events')->find($id);
$now = new\DateTime('now');
/* Now we will use set functions and inside this set functions we will bring the value that is already exist using get function for example we have setName() and inside it we will bring the current value and use it again */
                       $events->setTitle($events->getTitle());
           $events->setType($events->getType());
           $events->setDescription($events->getDescription());
           $events->setVenue($events->getVenue());
           $events->setstartTime($events->getstartTime());
           $events->setCreatedAt($now);
/* Now when you type createFormBuilder and you will put the variable todo the form will be filled of the data that you already set it */
       $form = $this->createFormBuilder($events)->add('title', TextType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-botton:15px')))
       ->add('type', TextType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
       ->add('description', TextareaType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-botton:15px')))
       ->add('venue', TextareaType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-botton:15px')))
   ->add('startTime', DateTimeType::class, array('attr' => array('style'=>'margin-bottom:15px')))
   ->add('save', SubmitType::class, array('label'=> 'Update Event', 'attr' => array('class'=> 'btn-primary', 'style'=>'margin-botton:15px')))
       ->getForm();
       $form->handleRequest($request);
       if($form->isSubmitted() && $form->isValid()){
           //fetching data
           $title = $form['title']->getData();
           $type = $form['type']->getData();
           $description = $form['description']->getData();
           $venue = $form['venue']->getData();
           $startTime = $form['startTime']->getData();
           $now = new\DateTime('now');
           $em = $this->getDoctrine()->getManager();
           $events = $em->getRepository('App:Events')->find($id);
           $events->setTitle($title);
           $events->setType($type);
           $events->setDescription($description);
           $events->setVenue($venue);
           $events->setstartTime($startTime);
           $events->setCreatedAt($now);
       
           $em->flush();
           $this->addFlash(
                   'notice',
                   'Event Updated'
                   );
           return $this->redirectToRoute('admin');
       }
       return $this->render('admin/edit.event.html.twig', array('events' => $events, 'form' => $form->createView()));
   }

   /**
    * @Route("/details/{id}", name="details_page")
    */
   public function detailsAction($id)
   {

   	 $events = $this->getDoctrine()->getRepository('App:Events')->find($id);
       
       return $this->render('admin/display.event.html.twig', array('events' => $events));
   }
}











