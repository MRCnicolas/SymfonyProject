<?php

namespace App\Controller;

use App\Classe\Cart;
use App\Entity\Order;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class OrderSuccessController extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager) {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/commande/merci/{stripeSessionId}", name="order_validate")
     */
    public function index(Cart $cart, $stripeSessionId)
    {
        $order = $this->entityManager->getRepository(Order::class)->findOneByStripeSessionId($stripeSessionId);


        if (!$order || $order->getUser() != $this->getUser()) {
            return $this->redirectToRoute('home');
        }

        if (!$order->getIspaid()) {

            $cart->remove();

            $order->setIsPaid(1);
            $this->entityManager->flush();
        }

        

        return $this->render('order_success/index.html.twig', [
            'title' => 'Confirmation de commande',
            'paragraphe' => 'Bonjour',
            'paragraphe1' => 'Nous vous remercions pour votre commande n° ',
            'paragraphe2' => "Une confirmation vient de vous être envoyée par email à l'adresse : ",
            'paragraphe3' => "Votre commande sera livrée par ",
            'paragraphe4' => " à l'adresse suivante : ",
            'paragraphe5' => "Pour suivre votre commande, rendez-vous dans votre ",
            'order' => $order
        ]);
    }
}
