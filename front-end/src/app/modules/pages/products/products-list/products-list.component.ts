import { Component, OnInit } from '@angular/core';
import { ProductsService } from 'src/app/core/http/products/products.service';
import { Product } from 'src/app/shared/interfaces/models/product';
import { CartService } from 'src/app/core/http/cart/cart.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-products-list',
  templateUrl: './products-list.component.html',
  styleUrls: ['./products-list.component.css']
})
export class ProductsListComponent implements OnInit {
  products: Product[] = [];

  constructor(
    private productService: ProductsService,
    private cartService: CartService,
    private router: Router
  ) {}

  ngOnInit(): void {
    this.productService.getProducts().subscribe(apiProductResponse => {
      this.products = apiProductResponse["hydra:member"];
    });
  }

  addToCart(product: Product) {
    this.cartService.addToCart(product);
    this.router.navigateByUrl('/cart');
  }
  }
