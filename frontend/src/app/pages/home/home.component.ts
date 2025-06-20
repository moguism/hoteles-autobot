import { Component, OnInit } from '@angular/core';
import { CustomRouterService } from '../../services/custom-router.service';
import { ActivatedRoute } from '@angular/router';
import { SweetalertService } from '../../services/sweetalert.service';

@Component({
  selector: 'app-home',
  imports: [],
  templateUrl: './home.component.html',
  styleUrl: './home.component.css'
})
export class HomeComponent implements OnInit {

  constructor(public router: CustomRouterService, private activatedRoute: ActivatedRoute, private sweetAlertService: SweetalertService){}

  ngOnInit(): void {
    this.activatedRoute.queryParams.subscribe(params => {
      const verified = params['verified']
      if(verified)
      {
        this.sweetAlertService.showAlert("Éxito", "Cuenta verificada correctamente", 'success')
      }
    });
  }
}
