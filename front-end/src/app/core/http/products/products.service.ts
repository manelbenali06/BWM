import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { ApiProductResponse } from 'src/app/shared/interfaces/api/api.product.response';
import { environment } from 'src/environments/environment.development';

@Injectable({
  providedIn: 'root'
})
export class ProductsService {
  constructor(private http: HttpClient) {
   }
   getProducts(): Observable<ApiProductResponse> {
    return this.http.get<ApiProductResponse>(environment.apiEndpoint+ '/api/products')
   }
}
