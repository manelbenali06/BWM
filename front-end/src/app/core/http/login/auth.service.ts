import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable, of } from 'rxjs';
import { catchError, map } from 'rxjs/operators';

@Injectable({
  providedIn: 'root'
})
export class AuthenticationService {
  private loginUrl = '/api/login'; // Remplacez par l'URL de votre endpoint de connexion

  constructor(private http: HttpClient) {}

  login(email: string, password: string): Observable<any> {
    const credentials = { email, password };
    return this.http.post(this.loginUrl, credentials).pipe(
      map(response => {
        // Traitez la réponse du serveur pour extraire les données utilisateur
        const user = response.user;
        // Stockez les informations de l'utilisateur dans le local storage ou tout autre moyen de votre choix
        localStorage.setItem('currentUser', JSON.stringify(user));
        return user;
      }),
      catchError(error => {
        // Traitez les erreurs de connexion
        // Vous pouvez personnaliser le traitement des erreurs ici
        return of({ error: 'Erreur lors de la connexion' });
      })
    );
  }

  logout(): void {
    // Supprimez les informations de l'utilisateur du local storage ou de tout autre moyen utilisé
    localStorage.removeItem('currentUser');
  }
}
