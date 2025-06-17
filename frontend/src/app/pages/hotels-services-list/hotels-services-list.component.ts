import { Component, OnInit } from '@angular/core';
import { HotelsServicesService } from '../../services/hotels-services.service';
import { Hotel } from '../../models/hotel';
import { Service } from '../../models/service';
import { CustomRouterService } from '../../services/custom-router.service';

@Component({
  selector: 'app-hotels-services-list',
  imports: [],
  templateUrl: './hotels-services-list.component.html',
  styleUrl: './hotels-services-list.component.css'
})
export class HotelsServicesListComponent implements OnInit {

  menuShowing: string = "hotels"
  hotels: Hotel[] = []
  services: Service[] = []

  constructor(private hotelsServicesService: HotelsServicesService, public router: CustomRouterService){}

  async ngOnInit() {
    this.hotels = await this.hotelsServicesService.getAllHotels()
    this.services = await this.hotelsServicesService.getAllServices()
  }
}
