<?php

namespace App\Controller;

use App\Classe\Search;
use App\Entity\Product;
use App\Form\SearchType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
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
    public function index(Request $request)
    {
        $products = $this->entityManager->getRepository(product::class)->findall();

        $search = new Search();
        $form = $this->createForm(SearchType::class, $search);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $products = $this->entityManager->getRepository(product::class)->findWithSearch($search);
        }

        return $this->render('product/index.html.twig', [
            'title' => 'Nos Produits Made in Réunion',
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
        $products = $this->entityManager->getRepository(Product::class)->findByIsBest(1);

        if (!$product) {
            return $this->redirectToRoute('products');
        }

        return $this->render('product/show.html.twig', [
            'title' => 'Les Produits',
            'product' => $product,
            'products' => $products
        ]);
    }
}
