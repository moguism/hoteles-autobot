import { Component, OnInit } from '@angular/core';
import { AuthService } from '../../services/auth.service';
import { HotelsServicesService } from '../../services/hotels-services.service';
import { ActivatedRoute } from '@angular/router';
import { Subscription } from 'rxjs';
import { Hotel } from '../../models/hotel';
import { HotelService } from '../../models/hotel-service';

@Component({
  selector: 'app-hotel-view',
  imports: [],
  templateUrl: './hotel-view.component.html',
  styleUrl: './hotel-view.component.css'
})
export class HotelViewComponent implements OnInit {

  constructor(
    public authService: AuthService, 
    private hotelsServicesService: HotelsServicesService,
    private activatedRoute: ActivatedRoute,
  ) {}

  id: number = 0;
  routeParamMap$: Subscription | null = null;
  hotel: Hotel | null = null;
  
  selectedService: HotelService | null  = null

  async ngOnInit(): Promise<void> 
  {
    this.routeParamMap$ = this.activatedRoute.paramMap.subscribe(async paramMap => {
        this.id = paramMap.get('id') as unknown as number;
        await this.getHotel()
    })
  }

  async getHotel()
  {
    this.hotel = await this.hotelsServicesService.getHotelById(this.id)
    this.selectedService = null
    console.log("Hotel: ", this.hotel)
  }

  changeSelectedService(hotelService: HotelService)
  {
    this.selectedService = hotelService
  }
}
