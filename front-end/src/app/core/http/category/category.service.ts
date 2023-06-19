
import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { ApiCategoryResponse } from 'src/app/shared/interfaces/api/api.category.response';
import { environment } from 'src/environments/environment.development';


@Injectable({
  providedIn: 'root'
})
export class CategoryService {

  constructor(private http: HttpClient) {

}
getCategories (): Observable<ApiCategoryResponse> {
  return this.http.get<ApiCategoryResponse>(environment.apiEndpoint + 'api/categories')
}
}
