import { Component } from '@angular/core';

@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.css']
})
export class HeaderComponent {
  user: any;

  checkIsAdmin(): boolean {
    if (this.user && this.user.role === 'admin') {
      return true;
    } else {
      return false;
    }
  }
}
