import { Component, Input } from '@angular/core';
import { Hotel } from '../../models/hotel';
import { CustomRouterService } from '../../services/custom-router.service';

@Component({
  selector: 'app-hotel-card',
  imports: [],
  templateUrl: './hotel-card.component.html',
  styleUrl: './hotel-card.component.css'
})
export class HotelCardComponent {

  @Input() hotel: Hotel | null = null

  constructor(public router: CustomRouterService){}

  openUrl(url: string)
  {
    window.open(url)
  }
}
