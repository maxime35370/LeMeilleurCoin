<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class DefaultController extends Controller
{
    /**
     * @Route("/connexion", name="connexion")
     */
    public function connexionAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/connexion.html.twig');
    }

    /**
     * @Route("/inscription", name="inscription")
     */
    public function inscriptionAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/inscription.html.twig');
    }

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig');
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route(name="accueil", path="/accueil")
     */
    public function accueilAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/accueil.html.twig');
    }
}
