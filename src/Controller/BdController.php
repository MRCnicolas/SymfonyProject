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
        'icones' => "images/icones/vanille.svg",
        'featurette1' => "images/featurette/rando.png",
        'featurette2' => "images/featurette/sport.png",
        'featurette3' => "images/featurette/plage.png",
        'featurette4' => "images/featurette/eglise.png",
        'featurette5' => "images/featurette/zourit.png",
        'featurette6' => "images/featurette/plantes.JPG",

        ]);

    }

    /**
     * @Route("/randonnée", name="app_randonnée")
     */
    public function randonnée(): Response
    {
        return $this->render('pages/randonnée.html.twig', [
            'title' => 'randonnée',
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
     * @Route("/contact", name="app_contact")
     */
    public function contact(): Response
    {
        return $this->render('pages/contact.html.twig', [
            'title' => 'contact',
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
