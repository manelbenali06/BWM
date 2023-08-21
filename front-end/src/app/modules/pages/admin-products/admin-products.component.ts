import { Component, OnInit } from '@angular/core';
import { ProductsService } from 'src/app/core/http/products/products.service';
import { Product } from 'src/app/shared/interfaces/models/product';

@Component({
  selector: 'app-admin-products',
  templateUrl: './admin-products.component.html',
  styleUrls: ['./admin-products.component.css']
})
export class AdminProductsComponent implements OnInit {
  products: Product[] = [];

  constructor(private productService: ProductsService) {}

  ngOnInit(): void {
    this.productService.getProducts().subscribe(apiProductResponse => {
      this.products = apiProductResponse["hydra:member"];
    });
  }
}
