import { Component } from '@angular/core';
import { User } from 'src/app/shared';
import { UserService } from 'src/app/core/http/user/user.service';
import { ApiErrorResponse } from 'src/app/shared/interfaces/api/api.error.reponse';
import {Router} from "@angular/router";

@Component({
  selector: 'app-register',
  templateUrl: './register.component.html',
  styleUrls: ['./register.component.css']
})
export class RegisterComponent {
  user: User = new User();
  hasError: boolean = false;
  hasErrorMessage: ApiErrorResponse | undefined
  constructor(private userService: UserService, private router:Router) {
  }

 /**
   * Se déclenche à la soumission du formulaire
   * d'inscription par l'utilisateur.
   */
  async register() {
  console.log( this.user );

  /*
   *  Appel a l'API de symfony pour enregistrer le nouvel utilisateur
   */
  const registeredUser= await this.userService.register(this.user);

  /*
   *  Redirige sur la page de connexion si valide
   */
  if (registeredUser.status) {
    await this.router.navigate(['/login']);
  }

  /*
   *  En cas d'erreur on affiche une alerte
   */
  this.hasError = true;
  this.hasErrorMessage = registeredUser.message;

}
}
