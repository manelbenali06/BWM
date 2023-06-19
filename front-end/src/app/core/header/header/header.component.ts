import { Component, OnInit } from '@angular/core';
import { Category } from 'src/app/shared/interfaces/models/category';
import { CategoryService } from '../../http/category/category.service';


@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.css']
})
export class HeaderComponent implements OnInit {
  user: any;
  checkIsAdmin(): boolean {
    if (this.user && this.user.role === 'admin') {
      return true;
    } else {
      return false;
    }
  }

/**
 * Initialisation d'un tableau de categorie vide
 */
categories: Category[] = [];
constructor(private categoryService: CategoryService){
  // Récupérer les catégories du service et mettre à jour le tableau des categories
}

ngOnInit(): void{
  this.categoryService.getCategories().subscribe(apiCategoryResponse => {
    this.categories = apiCategoryResponse["hydra:member"];
  });
}
}
