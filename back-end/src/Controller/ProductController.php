<?php

namespace App\Controller;
use App\Entity\Product;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


#[Route('/produits')]

class ProductController extends AbstractController
{
    #[Route('/', name: 'app_product_index')]
    public function index(ProductRepository $productRepository): Response
    {
        return $this->render('product/index.html.twig', [
            'products' => $productRepository->findAll(),
        ]);
    }
    
    #[Route('/{id}', name: 'app_product_show')]
    public function show(Product $product): Response
    {
        return $this->render('product/show.html.twig', [
        'product' => $product,
        ]);
    }

    #[Route('/{name}', name: 'product_search')]
    public function searchProductByName(string $name): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        
        // Utilisation d'une requête paramétrée pour rechercher le produit par son nom
        $query = $entityManager->createQuery(
            'SELECT p
            FROM App\Entity\Product p
            WHERE p.name = :name'
        )->setParameter('name', $name);

        $product = $query->getResult();

        return $this->render('product/search_result.html.twig', [
            'product' => $product,
        ]);
    }
}