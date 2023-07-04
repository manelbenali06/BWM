
import { Component, OnInit } from '@angular/core';
import { ProductsService } from 'src/app/core/http/products/products.service';
import { Product } from 'src/app/shared/interfaces/models/product';

@Component({
  selector: 'app-products-list',
  templateUrl: './products-list.component.html',
  styleUrls: ['./products-list.component.css']
})

export class ProductsListComponent implements OnInit{
  products: Product[] = [];
  constructor(private productService: ProductsService){
  // Récupérer les produits du service et mettre à jour le tableau des produits
}

  ngOnInit(): void{
    this.productService.getProducts().subscribe(apiProductResponse => {
      this.products = apiProductResponse["hydra:member"];
    });
  }
}

