import { Component, OnInit } from '@angular/core';
import { CategoryService } from 'src/app/core/http/category/category.service';
import { Category } from 'src/app/shared/interfaces/models/category';

@Component({
  selector: 'app-categories-list',
  templateUrl: './categories-list.component.html',
  styleUrls: ['./categories-list.component.css']
})
export class CategoriesListComponent implements OnInit{
  //le but est de recuperer les categories depuis l'api
  //déclarer les categories ->déclarer un attribut: un tableau de category
  //Category[] est une interface avec les propriets:id, name
  categories: Category[] = [];
  constructor(private categoryService: CategoryService){
  // Récupérer les catégories du service et mettre à jour le tableau des categories
}
  ngOnInit(): void{
    this.categoryService.getCategories().subscribe(apiCategoryResponse => {
      this.categories = apiCategoryResponse["hydra:member"];
    });
    console.log(this.categories);
  }
}

