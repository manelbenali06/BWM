import { Injectable } from '@angular/core';
import { Product } from 'src/app/shared/interfaces/models/product';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

declare const Stripe;
@Injectable({
  providedIn: 'root'
})
export class CartService {
  private cartItems: Product[] = [];
  private stripeApiUrl = ''; // Remplacez par l'URL de votre API Stripe

  constructor(private http: HttpClient) {
    // Retrieve cart items from localStorage if they exist
    const storedCartItems = localStorage.getItem('cartItems');
    if (storedCartItems) {
      this.cartItems = JSON.parse(storedCartItems);
    }
  }

  addToCart(product: Product) {
    const existingProduct = this.cartItems.find(item => item.id === product.id);
    if (existingProduct) {
      existingProduct.quantity++;
    } else {
      product.quantity = 1;
      this.cartItems.push(product);
    }
    this.saveCart();
  }

  decreaseQuantity(product: Product) {
    const existingProduct = this.cartItems.find(item => item.id === product.id);
    if (existingProduct) {
      if (existingProduct.quantity > 1) {
        existingProduct.quantity--;
      } else {
        this.removeFromCart(product);
      }
    }
    this.saveCart();
  }

  removeFromCart(product: Product) {
    this.cartItems = this.cartItems.filter(item => item.id !== product.id);
    this.saveCart();
  }

  getCartItems() {
    return this.cartItems;
  }

  clearCart() {
    this.cartItems = [];
    this.saveCart();
  }

  private saveCart() {
    localStorage.setItem('cartItems', JSON.stringify(this.cartItems));
  }

}

