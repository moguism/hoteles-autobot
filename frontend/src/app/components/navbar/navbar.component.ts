import { Component } from '@angular/core';
import { AuthService } from '../../services/auth.service';
import { CustomRouterService } from '../../services/custom-router.service';

@Component({
  selector: 'app-navbar',
  imports: [],
  templateUrl: './navbar.component.html',
  styleUrl: './navbar.component.css'
})
export class NavbarComponent {

  constructor(
    public authService: AuthService,
    public router: CustomRouterService
  ){}

}
