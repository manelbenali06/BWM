
import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { ApiCategoryResponse } from 'src/app/shared/interfaces/api/api.category.response';
import { environment } from 'src/environments/environment.development';


@Injectable({
  providedIn: 'root'
})
export class CategoryService {
  /* pour acceder au service http il faut l'injecter avec la methode private ici
  le nom de l'attribut est http mais on peut le changer  */
  constructor(private http: HttpClient) {

}
  getCategories (): Observable<ApiCategoryResponse> {
    /*On fait reference a notre service this.http
      On realise methode get pour le call de la requette
      cette methode va retourner un obseravble quiva me dire le type de ressources qu'il va retourner
      avec <>
      ON precise l'url ou est ce qu'on va faire cette requette http
    */
    return this.http.get<ApiCategoryResponse>(environment.apiEndpoint + 'api/categories')
}
}
