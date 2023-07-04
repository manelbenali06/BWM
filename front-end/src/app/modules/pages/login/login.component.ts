import { Component } from '@angular/core';
import { AuthenticationService } from './authentificationService';

@Component({
  selector: 'app-login',
  templateUrl: 'login.component.html',
  styleUrls: ['login.component.css']
})
export class LoginComponent {
  email: string = '';
  password: string = '';
  error: string = '';
  loggedInUser: string = '';
  csrfToken: string = ''; // Replace with the actual value

  constructor(private authService: AuthenticationService) {}

  login() {
    this.authService.login(this.email, this.password)
      .subscribe(
        user => {
          this.loggedInUser = user.username; // Replace with the appropriate property of the user object
        },
        error => {
          this.error = error.message; // Replace with the appropriate property of the error object
        }
      );
  }

  logout() {
    this.authService.logout();
    this.loggedInUser = '';
  }
}
