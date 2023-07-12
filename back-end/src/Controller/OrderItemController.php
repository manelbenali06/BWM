<?php

namespace App\Controller;

use App\Repository\OrderItemRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/order_item', name:'order_item_')]
class OrderItemController extends AbstractController
{
    #[Route('/', name: 'index', methods: ['GET'])]
    public function index(OrderItemRepository $orderItemRepository): Response
    {
        return $this->render('order_item/index.html.twig', [
            'order_items' => $orderItemRepository->findAll(),
        ]);
    }
    #[Route('/{id}', name: 'show', methods: ['GET'])]
    public function show(OrderItemRepository $orderItemRepository): Response
    {
        return $this->render('order_item/show.html.twig', [
            'order_item' => $orderItemRepository,
        ]);
    }
}