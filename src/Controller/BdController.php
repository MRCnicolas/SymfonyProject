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
