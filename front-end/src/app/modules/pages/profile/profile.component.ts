import { Component, OnInit } from '@angular/core';
import { User } from 'src/app/shared';
import { UserService } from 'src/app/core/http/user/user.service';

@Component({
  selector: 'app-profile',
  templateUrl: './profile.component.html',
  styleUrls: ['./profile.component.css']
})
export class ProfileComponent implements OnInit {
  user: User = new User();

  constructor(private userService: UserService) { }

  ngOnInit(): void {
    this.getUserData();
  }

  getUserData(): void {
    const authToken = localStorage.getItem('token'); // Récupérez le jeton d'accès à partir du localStorage ou de la source appropriée

   
  }
}
