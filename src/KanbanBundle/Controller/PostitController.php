<?php

namespace KanbanBundle\Controller;

use KanbanBundle\Entity\Postit;
use KanbanBundle\Form\PostitType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PostitController extends Controller
{
    public function listAction()
    {
        $tache = $this->getDoctrine()->getManager()->getRepository('KanbanBundle:Postit')->findAll();

        return $this->render('KanbanBundle:Postit:index.html.twig', array(
            'taches'=>$tache
        ));
    }

    public function editAction($idPostit)
    {
        $em = $this->getDoctrine()->getManager();
        //$postIt =

        return $this->render('KanbanBundle:Postit:edit.html.twig', array('id'=>$idPostit
            // ...
        ));
    }

    public function createAction(Request $request)
    {
        $postit = new Postit();

        $formPostit = $this->createForm(PostitType::class,$postit);

        $formPostit->handleRequest($request);

        if ($formPostit->isSubmitted() && $formPostit->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($postit);
            $em->flush();

            return $this->redirectToRoute('list');

        }


        return $this->render('KanbanBundle:Postit:create.html.twig', array(
            'formPostit'=>$formPostit->createView()
        ));
    }

    public function deleteAcion($idPostit)
    {
        $em = $this->getDoctrine()->getManager();
        $postit = $em->getRepository('KanbanBundle:Postit')->find($idPostit);
        $em->remove($postit);
        $em->flush();
        return $this->redirectToRoute('list');
    }

}
