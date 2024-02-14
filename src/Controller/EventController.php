<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\EventRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Event;
use App\Form\EventType;

class EventController extends AbstractController
{
    #[Route('/event', name: 'app_event')]
    public function index(): Response
    {
        return $this->render('event/index.html.twig', [
            'controller_name' => 'EventController',
        ]);
    }
    #[Route('/add', name: 'add')]
    public function add( ManagerRegistry $managerRegistry,Request $req): Response
    { 
        $x=$managerRegistry->getManager();//appelle manager registry ili yaamel delete wala mise a jour
        $event=new Event();//instance 
        $form = $this->createForm(EventType::class,$event);
        $form->handleRequest($req);
        
        if($form->isSubmitted() and $form->isValid() ){
        $x->persist($event);
        $x->flush();
        return $this->redirectToRoute('show');
        }
        return $this->renderForm('event/add.html.twig', [
            
            'form'=>$form
        ]);
    }
    #[Route('/show', name: 'show')]
    public function show(EventRepository $EventRepository): Response
    {
        $event= $EventRepository->findAll();
        return $this->render('event/show.html.twig', [
           'evenement'=>$event
        ]);
    }
    
    #[Route('/edit/{id}', name: 'edit')]
    public function edit( $id,ManagerRegistry $managerRegistry,Request $req, EventRepository $EventRepository): Response   
     {{$x= $managerRegistry->getManager();
        $detaid=$EventRepository->find($id);
        //var_dump($detail).die
        $form = $this->createForm(EventType::class,$detaid);
        $form->handleRequest($req);
        if($form->isSubmitted() and $form->isValid() ){
            $x->persist($detaid);
            $x->flush();
            return $this->redirectToRoute('show');
        }
       
        return $this->renderForm('event/edit.html.twig', [
            'form'=>$form        ]
        );
    }
    }

   
    
    #[Route('/delete/{id}', name: 'delete')]
    public function delete( $id,ManagerRegistry $managerRegistry,Request $req, EventRepository $EventRepository): Response   
     {{$x= $managerRegistry->getManager();
        $detaid=$EventRepository->find($id);
        $x->remove($detaid);
        //var_dump($detail).die
        
            $x->flush();
            return $this->redirectToRoute('add');
        }
    
    }
}
