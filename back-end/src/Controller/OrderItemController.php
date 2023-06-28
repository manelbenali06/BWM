<?php

namespace App\Controller\Admin;

use App\Entity\OrderItem;
use App\Form\OrderItemType;
use App\Repository\OrderItemRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/order_item', name:'order_item_')]
class AdminOrderItemController extends AbstractController
{
    #[Route('/', name: 'index', methods: ['GET'])]
    public function index(OrderItemRepository $orderItemRepository): Response
    {
        return $this->render('order_item/index.html.twig', [
            'order_items' => $orderItemRepository->findAll(),
        ]);
    }
}