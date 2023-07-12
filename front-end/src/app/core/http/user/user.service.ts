import { Injectable } from '@angular/core';
import {HttpClient, HttpHeaders} from "@angular/common/http";
import { User } from 'src/app/shared';
import {lastValueFrom} from "rxjs";
import { environment } from 'src/environments/environment.development';
import { ApiErrorResponse } from 'src/app/shared/interfaces/api/api.error.reponse';

@Injectable({
  providedIn: 'root'
})
export class UserService {

  constructor(private http: HttpClient) {
  }

  async register(user: User):Promise<{status:boolean,token?:User, message?:ApiErrorResponse}> {
    try {
      const source$ = this.http.post<User>(environment.apiEndpoint + '/api/users', user);
      const response = await lastValueFrom(source$)
      return {
        status: true,
        token: response
      }
    } catch (errorResponse: any) {
      return {
        status: false,
        message: errorResponse.error
      }
    }
  }

  async getTokenAccess(user: User): Promise<any> {
    const body = {
      email: user.email,
      password: user.password
    };
    try {
      const source$ = this.http.post<{status:boolean, token?:string, message?:ApiErrorResponse}>(environment.apiEndpoint + '/auth', body);
      const response = await lastValueFrom(source$)
      return {
        status: true,
        token: response.token
      }
    } catch (errorResponse: any) {
      return {
        status: false,
        message: errorResponse.error
      }
    }
  }

  async getMe(authToken: string): Promise<any> {
    try {
      const body = {};
      const headers = new HttpHeaders().set('Authorization', 'Bearer ' + authToken);
      const source$ = this.http.get<User>(environment.apiEndpoint + '/api/me', {
        headers
      });
      const response = await lastValueFrom(source$)
      return {
        status: true,
        token: response
      }
    } catch (errorResponse: any) {
      return {
        status: false,
        message: errorResponse.error
      }
    }
  }

}
