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


    /**
     * @Route("/compte/mes-commandes/{reference}", name="account_order_show")
     */
    public function show($reference)
    {

        $order = $this->entityManager->getRepository(Order::class)->findOneByReference($reference);

        if (!$order || $order->getUser() != $this->getUser()) {
            return $this->redirectToRoute('account_order');
        }

        return $this->render('account/order_show.html.twig', [
            'title' => 'Ma commande',
            'paragraphe' => 'Commande passée le :',
            'paragraphe1' => 'Référence de ma commande :',
            'paragraphe2' => 'Transporteur choisi :',
            'paragraphe3' => 'Détails de ma commande:',
            'paragraphe4' => 'Sous-total : ',
            'paragraphe5' => 'Livraison : ',
            'paragraphe6' => 'Total : ',
            'order' => $order
            
        ]);
    }
}
