<?php

namespace App\Controller\Admin;

use App\Entity\OrderItem;
use App\Form\OrderItemType;
use App\Repository\OrderItemRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/admin/order_item', name:'admin_order_item_')]
class AdminOrderItemController extends AbstractController
{
    #[Route('/', name: 'index', methods: ['GET'])]
    public function index(OrderItemRepository $orderItemRepository): Response
    {
        return $this->render('admin/order_item/index.html.twig', [
            'order_items' => $orderItemRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'new', methods: ['GET', 'POST'])]
    public function new(Request $request, OrderItemRepository $orderItemRepository): Response
    {
        $orderItem = new OrderItem();
        $form = $this->createForm(OrderItemType::class, $orderItem);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $orderItemRepository->save($orderItem, true);

            return $this->redirectToRoute('admin_order_item_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/order_item/new.html.twig', [
            'order_item' => $orderItem,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'show', methods: ['GET'])]
    public function show(OrderItem $orderItem): Response
    {
        return $this->render('admin/order_item/show.html.twig', [
            'order_item' => $orderItem,
        ]);
    }

    #[Route('/{id}/edit', name: 'admin_order_item_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, OrderItem $orderItem, OrderItemRepository $orderItemRepository): Response
    {
        $form = $this->createForm(OrderItemType::class, $orderItem);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $orderItemRepository->save($orderItem, true);

            return $this->redirectToRoute('admin_order_item_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/order_item/edit.html.twig', [
            'order_item' => $orderItem,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'delete', methods: ['POST'])]
    public function delete(Request $request, OrderItem $orderItem, OrderItemRepository $orderItemRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$orderItem->getId(), $request->request->get('_token'))) {
            $orderItemRepository->remove($orderItem, true);
        }

        return $this->redirectToRoute('admin_order_item_index', [], Response::HTTP_SEE_OTHER);
    }
}