<?php

namespace KanbanBundle\Controller;

use KanbanBundle\Entity\Tache;
use KanbanBundle\Form\TacheType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class TacheController extends Controller
{
    public function listAction()
    {
        $tache = $this->getDoctrine()->getManager()->getRepository('KanbanBundle:Tache')->findAll();

        return $this->render('KanbanBundle:Tache:index.html.twig', array(
            'taches'=>$tache
        ));
    }

    public function editAction($idTache)
    {
        $em = $this->getDoctrine()->getManager();
        //$postIt =

        return $this->render('KanbanBundle:Tache:edit.html.twig', array('id'=>$idTache
            // ...
        ));
    }

    public function createAction(Request $request)
    {
        $tache = new Tache();

        $formPostit = $this->createForm(TacheType::class,$tache);

        $formPostit->handleRequest($request);

        if ($formPostit->isSubmitted() && $formPostit->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tache);
            $em->flush();
            
            return $this->redirectToRoute('list');
        }

        return $this->render('KanbanBundle:Tache:create.html.twig', array(
            'formPostit'=>$formPostit->createView()
        ));
    }

    public function deleteAction($idTache)
    {
        $em = $this->getDoctrine()->getManager();
        $tache = $em->getRepository('KanbanBundle:Tache')->find($idTache);
        $em->remove($tache);
        $em->flush();
        return $this->redirectToRoute('list');
    }

    public function etatAction($idTache, $etat)
    {

        $em = $this->getDoctrine()->getManager();
        $tache = $em->getRepository('KanbanBundle:Tache')->find($idTache);

        if(!$tache)
        {
            throw $this->createNotFoundException("cette tache n'existe pas ");
        }else{
            $tache->setEtat($etat);
            $em->flush();
        }


        return $this->redirectToRoute('list');
    }
}
