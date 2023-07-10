import { Component } from '@angular/core';
import { User } from 'src/app/shared';
import { UserService } from 'src/app/core/http/user/user.service';
import { ApiErrorResponse } from 'src/app/shared/interfaces/api/api.error.reponse';
import {Router} from "@angular/router";

@Component({
  selector: 'app-login',
  templateUrl: 'login.component.html',
  styleUrls: ['login.component.css']
})
export class LoginComponent {
  user: User = new User();
  hasError: boolean = false;
  hasErrorMessage: ApiErrorResponse | undefined

  constructor(private userService: UserService, private router: Router) {
  }

  async login() {
    const response = await this.userService.getTokenAccess(this.user);
    console.log(response);

    if (response.status) {
      this.hasError = false;

    }

    this.hasError = true;
    this.hasErrorMessage = response.message;
  }
}
