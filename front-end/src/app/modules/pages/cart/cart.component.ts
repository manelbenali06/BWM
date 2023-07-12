import { Component } from '@angular/core';
import { CartService } from 'src/app/core/http/cart/cart.service';
import { Product } from 'src/app/shared/interfaces/models/product';

@Component({
  selector: 'app-cart',
  templateUrl: './cart.component.html',
  styleUrls: ['./cart.component.css']
})
export class CartComponent {
  cartItems: Product[] = [];

  constructor(private cartService: CartService) {
    this.cartItems = this.cartService.getCartItems();
  }

  removeFromCart(product: Product) {
    this.cartService.removeFromCart(product);
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

  calculateTotal(): number {
    let total = 0;
    for (let item of this.cartItems) {
      total += item.price * item.quantity;
    }
    return total;
  }
}
