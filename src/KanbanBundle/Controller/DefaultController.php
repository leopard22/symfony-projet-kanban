<?php

namespace KanbanBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('KanbanBundle:Default:index.html.twig');
    }
}
