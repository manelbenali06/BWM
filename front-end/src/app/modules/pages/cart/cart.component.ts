import { Component } from '@angular/core';
import { CartService } from 'src/app/core/http/cart/cart.service'; // Assurez-vous de mettre le bon chemin d'accès
import { Product } from 'src/app/shared/interfaces/models/product';
import { loadStripe } from '@stripe/stripe-js';
 // Assurez-vous de mettre le bon chemin d'accès

@Component({
  selector: 'app-cart',
  templateUrl: './cart.component.html',
  styleUrls: ['./cart.component.css']
})
export class CartComponent {
  cartItems: Product[] = [];

  constructor(private cartService: CartService) {
    // Récupérer les éléments du panier lors de l'initialisation du composant
    this.cartItems = this.cartService.getCartItems();
  }

  removeFromCart(product: Product) {
    this.cartService.removeFromCart(product);
    // Mettre à jour les éléments du panier après la suppression d'un produit
    this.cartItems = this.cartService.getCartItems();
  }

  addToCart(product: Product) {


    this.cartService.addToCart(product);
      }

      decreaseQuantity(product: Product) {
        this.cartService.decreaseQuantity(product);
      }

      clearCart() {
        this.cartService.clearCart();
    this.cartItems = [];
      }
    }
