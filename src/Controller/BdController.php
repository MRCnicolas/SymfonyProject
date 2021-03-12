<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BdController extends AbstractController
{
    
    /**
     * @Route("/home", name="app_home")
     */
    public function home(): Response
    {
        return $this->render('pages/home.html.twig', [
        'title' => " '' Le DoDo Y Guide A Ou '' ",
        'intro' => "Avec DODO LE GUIDE Vous Serez Votre Propre
        Guide.",
        'intro2' => "Voici Nos Conseils Et Notre Selections De
        Lieux Et D'activités Incontournables à Decouvrir Lors De Votre
        Séjour.",
        'video' => "https://www.youtube.com/embed/UoTYNd3luOA?autoplay=1&mute=1&enablejsapi=1controls=0loop=1&amp;start=56",
        'icones' => "images/pagehome/icones/vanille.svg",
        'featurette1' => "images/pagehome/featurette/rando.png",
        'featurette2' => "images/pagehome/featurette/sport.png",
        'featurette3' => "images/pagehome/featurette/plage.png",
        'featurette4' => "images/pagehome/featurette/eglise.png",
        'featurette5' => "images/pagehome/featurette/zourit.png",
        'featurette6' => "images/pagehome/featurette/plantes.JPG",
        'icones1' => "images/pagehome/icones/panneau.png",

        ]);

    }

    /**
     * @Route("/randonnée", name="app_randonnée")
     */
    public function randonnée(): Response
    {
        return $this->render('pages/randonnée.html.twig', [
            'title' => 'Les Randonnées',
            'featurettes1' => "images/pagerandonnées/featurettes/pitondelafournaise/piton.jpg",
            'featurettes2' => "images/pagerandonnées/featurettes/plagedelhermitage/hermitage.png",
            'featurettes3' => "images/pagerandonnées/featurettes/cirquecilaos/cilaospano.jpg",
            'featurettes4' => "images/pagerandonnées/featurettes/puitdesanglais/puit.jpg",
            'featurettes5' => "images/pagerandonnées/featurettes/troudefer/trou-de-fer.jpg",
            'featurettes6' => "images/pagerandonnées/featurettes/mafate/mafate.jpg",
            'featurettes7' => "images/pagerandonnées/featurettes/salazie/salazie.jpg",
            'featurettes8' => "images/pagerandonnées/featurettes/marreapouledeau/marre.jpg",
        ]);
    }

    /**
     * @Route("/activitésportive", name="app_activitésportive")
     */
    public function activitésportive(): Response
    {
        return $this->render('pages/activitésportive.html.twig', [
            'title' => 'activitésportive',
        ]);
    }

    /**
     * @Route("/about", name="app_about")
     */
    public function about(): Response
    {
        return $this->render('pages/about.html.twig', [
            'title' => 'about',
        ]);
    }

    



}
