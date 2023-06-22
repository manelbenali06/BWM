<?php

namespace App\Service;

use App\Entity\Product;
use Symfony\Component\HttpFoundation\RequestStack;

class CartService {

    private RequestStack $requestStack;

    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }

    public function getCart(): array {
        $session = $this->requestStack->getSession();
        return $session->get('cart', []);
    }

    private function saveCart(array $cart): void {
        $session = $this->requestStack->getSession();
        $session->set('cart', $cart);
    }

    public function add(Product $product): array {
        $cart = $this->getCart();
        $productId = $product->getId();
        if (!isset($cart[$productId])) {
            $cart[$productId] = [
                'product' => $product,
                'quantity' => 0
            ];
        }
        $cart[$productId]['quantity'] = $cart[$productId]['quantity'] + 1;
        $this->saveCart($cart);
        return $cart;
    }

    public function clear(): array {
        $cart = [];
        $this->saveCart($cart);
        return $cart;
    }

    public function remove(Product $product): array {
        $cart = $this->getCart();
        $productId = $product->getId();
        if (!isset($cart[$productId])) {
            return $cart;
        }
        $cart[$productId]['quantity'] = $cart[$productId]['quantity'] - 1;
        if ($cart[$productId]['quantity'] <= 0) {
            unset($cart[$productId]);
        }
        $this->saveCart($cart);
        return $cart;
    }

    public function getTotalAmount(): float {
        $amount = 0.0;

        $cart = $this->getCart();
        foreach ($cart as $productId => $item) {
            $amount += $item['quantity'] * $item['product']->getPrice();
        }
        
        return $amount;
    }

}