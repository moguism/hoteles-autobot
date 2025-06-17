import { Component } from '@angular/core';
import { CustomRouterService } from '../../services/custom-router.service';

@Component({
  selector: 'app-home',
  imports: [],
  templateUrl: './home.component.html',
  styleUrl: './home.component.css'
})
export class HomeComponent {

  constructor(public router: CustomRouterService)
  {

  }
}
