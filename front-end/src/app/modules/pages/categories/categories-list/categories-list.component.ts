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
    //Dans ce cas, le code utilise le service categoryService pour récupérer
    // les catégories à partir d'une API. Le service retourne une réponse sous
    //la forme de apiCategoryResponse. Le code extrait les données de la propriété
    // "hydra:member" de la réponse et les affecte à la variable categories.
    //on va souscrire a notre observable
    this.categoryService.getCategories().subscribe(apiCategoryResponse => {
      this.categories = apiCategoryResponse["hydra:member"];
      console.log(this.categories);
    });
  }
}

