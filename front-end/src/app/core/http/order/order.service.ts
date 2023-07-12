import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { ApiOrderResponse } from 'src/app/shared/interfaces/api/api.order.reponse';
import { Observable } from 'rxjs';
import { environment } from 'src/environments/environment.development';

@Injectable({
  providedIn: 'root'
})
export class OrderService {

  constructor(private http: HttpClient) {
  }
    getOrder (): Observable<ApiOrderResponse> {
      /*On fait reference a notre service this.http
        On realise methode get pour le call de la requette
        cette methode va retourner un obseravble quiva me dire le type de ressources qu'il va retourner
        avec <>
        ON precise l'url ou est ce qu'on va faire cette requette http
      */
      return this.http.get<ApiOrderResponse>(environment.apiEndpoint + '/api/orders')
   }
}
