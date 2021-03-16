<?php

namespace App\Controller;

use App\Classe\Search;
use App\Entity\Product;
use App\Form\SearchType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProductController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    /**
     * @Route("/nos-produits", name="products")
     */
    public function index()
    {
        $products = $this->entityManager->getRepository(product::class)->findall();

        $search = new Search();
        $form = $this->createForm(SearchType::class, $search);

        return $this->render('product/index.html.twig', [
            'title' => 'Les Produits',
            'products' => $products,
            'form' => $form->createview()
        ]);
    }




    /**
     * @Route("/produit/{slug}", name="product")
     */
    public function show($slug)
    {
        $product = $this->entityManager->getRepository(product::class)->findOneBySlug($slug);

        if (!$product) {
            return $this->redirectToRoute('products');
        }

        return $this->render('product/show.html.twig', [
            'title' => 'Les Produits',
            'product' => $product
        ]);
    }
}
