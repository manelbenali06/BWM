<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\Product1Type;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/catalog')]
class CatalogController extends AbstractController
{
    #[Route('/', name: 'app_catalog_index', methods: ['GET'])]
    public function index(ProductRepository $productRepository): Response
    {
        return $this->render('catalog/index.html.twig', [
            'products' => $productRepository->findAll(),
        ]);
    }

    #[Route('/', name: 'app_catalog_show', methods: ['GET'])]
    public function show(Product $product): Response
    {
        return $this->render('catalog/show.html.twig', [
            'product'=>$product,
        ]);
    }


}