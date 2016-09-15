<?php

namespace KanbanBundle\Controller;

use KanbanBundle\Entity\Postit;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PostitController extends Controller
{
    public function listAction()
    {
        return $this->render('KanbanBundle:Postit:index.html.twig', array(
            // ...
        ));
    }

    public function editAction()
    {
        return $this->render('KanbanBundle:Postit:edit.html.twig', array(
            // ...
        ));
    }

    public function createAction()
    {
        $postit = new Postit();
        return $this->render('KanbanBundle:Postit:create.html.twig', array(
            // ...
        ));
    }

}
