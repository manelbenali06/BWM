import { Component, OnInit } from '@angular/core';
import { ProductsService } from 'src/app/core/http/products/products.service';
import { Product } from 'src/app/shared/interfaces/models/product';


@Component({
  selector: 'app-admin-products-edit',
  templateUrl: './admin-products-edit.component.html',
  styleUrls: ['./admin-products-edit.component.css']
})
export class AdminProductsEditComponent {
  products: Product[] = [];

  constructor(private productService: ProductsService) {}

  ngOnInit(): void {
    this.productService.getProducts().subscribe(apiProductResponse => {
      this.products = apiProductResponse["hydra:member"];
    });
  }
}
