import { HttpClientModule } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { ApiCategoryResponse } from 'src/app/shared/interfaces/api/api.category.response';


@Injectable({
  providedIn: 'root'
})
export class CategoryService {

  constructor(private http: HttpClientModule) {

   }
//Observable : un element qui s'occupe de surveiller a quelle moment la donné arrive quand on fait une requette
//et quand les données seront disponbile il va nous prevenir
   getCategories(): Observable<ApiCategoryResponse>{  //Réccuperer les categorie depuis l'API(getCategorie)
    return this.http.get<ApiCategoryResponse>('https://127.0.0.1:8000/api/categories');//pour la secruité on va typé ce qui va nous etre retournée comme donné
   }
}
