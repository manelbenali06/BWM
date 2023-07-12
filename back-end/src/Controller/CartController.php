<?php

namespace App\Controller;

use App\Entity\Product;
use App\Service\CartService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CartController extends AbstractController
{
    

    /**
     * @Route("/cart", name="app_cart_index")
     */
    public function index(CartService $cartService): Response
{
    $cart = $cartService->getCart();
    $totalAmount = $cartService->getTotalAmount();
    return $this->render('cart/index.html.twig', [
        'cart' => array_values($cart),
        'totalAmount' => $totalAmount
    ]);
}
    /**
     * @Route("/cart/add/{id}", name="app_cart_add")
     */
    public function add(Product $product, CartService $cartService): Response
    {
        $cartService->add($product);
        return $this->redirectToRoute('app_cart_index');
    }

    /**
     * @Route("/cart/delete/{id}", name="app_cart_delete")
     */
    public function delete(Product $product, CartService $cartService): Response
    {
        $cartService->remove($product);
        return $this->redirectToRoute('app_cart_index');
    }

    /**
     * @Route("/cart/clear", name="app_cart_clear")
     */
    public function clear(CartService $cartService): Response
    {
        $cartService->clear();
        return $this->redirectToRoute('app_cart_index');
    }
   
    /**
     * @Route("/cart/increase/{id}", name="app_cart_increase")
     */
    public function increaseQuantity(Product $product, CartService $cartService): Response
    {
        $cartService->increaseQuantity($product);
        return $this->redirectToRoute('app_cart_index');
    }

    /**
     * @Route("/cart/decrease/{id}", name="app_cart_decrease")
     */
    public function decreaseQuantity(Product $product, CartService $cartService): Response
    {
        $cartService->decreaseQuantity($product);
        return $this->redirectToRoute('app_cart_index');
    }


}