<?php

namespace App\Controller;

use App\Entity\Order;
use App\Entity\OrderItem;
use App\Entity\User;
use App\Repository\ProductRepository;
use App\Service\CartService;
use App\Service\PaymentService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PaymentController extends AbstractController
{
    /**
     * @Route("/user/payment/redirect", name="app_payment_redirect")
     */
    public function redirectToStripe(PaymentService $paymentService, CartService $cartService): Response
    {
        $amount = $cartService->getTotalAmount();
        return $this->render('payment/redirect.html.twig', [
            'sessionId' => $paymentService->create($amount),
            'publicKey' => $paymentService->getPublicKey()
        ]);
    }

    /**
     * @Route("/payment/cancel/{sessionId}", name="app_payment_cancel")
     */
    public function cancel(string $sessionId): Response
    {
        return $this->render('payment/cancel.html.twig', [
            'sessionId' => $sessionId
        ]);
    }

    /**
     * @Route("/payment/success/{sessionId}", name="app_payment_success")
     */
    public function success(string $sessionId, ProductRepository $productRepository, CartService $cartService, EntityManagerInterface $entityManager): Response
    {
        $order = new Order();
        $order->setReference(rand(0,1000000));
        $order->setPaidAt(new \DateTimeImmutable());
        $order->setAmount($cartService->getTotalAmount());
        /** @var User $user */
        $user = $this->getUser();
        $order->setUser($user);
        $entityManager->persist($order);
        $cart = $cartService->getCart();
        foreach ($cart as $productId => $item) {
            $orederItem = new OrderItem();
            $product = $productRepository->find($productId);
            $orederItem->setProduct($product);
            $orederItem->setQuantity($item['quantity']);
            $orederItem->setPurchase($order);
            $entityManager->persist($orederItem);
        }
        $entityManager->flush();
        $cartService->clear();

        return $this->render('payment/success.html.twig', [
            'sessionId' => $sessionId
        ]);
    }
}
