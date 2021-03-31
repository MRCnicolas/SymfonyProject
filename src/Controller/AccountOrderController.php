<?php

namespace App\Controller;

use App\Entity\Order;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AccountOrderController extends AbstractController
{

    private $entityManager;
    
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/compte/mes-commandes", name="account_order")
     */
    public function index()
    {

        $orders = $this->entityManager->getRepository(Order::class)->findSuccessOrders($this->getUser());


        return $this->render('account/order.html.twig', [
            'title' => 'Mes commandes',
            'paragraphe' => "C'est dans cet espace que vous allez pouvoir gérer toutes vos commandes.",
            'paragraphe1' => "Vous n'avez pas encore passé de commande sur Dodo le guide.",
            'orders' => $orders
            
        ]);
    }
}
