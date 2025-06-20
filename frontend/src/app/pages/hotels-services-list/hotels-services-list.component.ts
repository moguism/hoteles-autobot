import { Component, OnInit } from '@angular/core';
import { HotelsServicesService } from '../../services/hotels-services.service';
import { Hotel } from '../../models/hotel';
import { Service } from '../../models/service';
import { CustomRouterService } from '../../services/custom-router.service';
import { HotelCardComponent } from '../../components/hotel-card/hotel-card.component';
import { FormsModule } from '@angular/forms';

@Component({
  selector: 'app-hotels-services-list',
  imports: [HotelCardComponent, FormsModule],
  templateUrl: './hotels-services-list.component.html',
  styleUrls: ['./hotels-services-list.component.css']
})
export class HotelsServicesListComponent implements OnInit {

  menuShowing: string = "hotels"
  searchQuery: string = ""
  sortValue: string = "asc"

  hotels: Hotel[] = []
  searchedHotels: Hotel[] = []
  sortedHotels: Hotel[] = []

  services: Service[] = []

  constructor(private hotelsServicesService: HotelsServicesService, public router: CustomRouterService){}

  async ngOnInit() {
    this.hotels = await this.hotelsServicesService.getAllHotels()
    this.services = await this.hotelsServicesService.getAllServices()
    this.sortedHotels = [...this.hotels]
    this.searchedHotels = this.sortedHotels
    this.sortHotels()
  }

  onSearchChange() {
    const query = this.searchQuery.trim()
    
    if (query == "")
    {
      this.searchedHotels = [...this.sortedHotels]
    } 
    else 
    {
      this.searchedHotels = this.hotels.filter(hotel => 
        hotel.name.toLowerCase().includes(query.toLowerCase())
      )
    }

    this.sortHotels()
  }


  onOrderChange() {
    this.sortHotels()
  }

  getHotelPrice(hotel: Hotel): number {
    const price = hotel.services[0].date_prices[hotel.services[0].date_prices.length - 1]?.price
    return price != null ? price : Infinity // Por si el precio es null para que vaya al final
  }

  sortHotels() {
    if (this.sortValue == 'asc') {
      this.searchedHotels.sort((a, b) => this.getHotelPrice(a) - this.getHotelPrice(b))
    } else if (this.sortValue == 'desc') {
      this.searchedHotels.sort((a, b) => this.getHotelPrice(b) - this.getHotelPrice(a))
    }
  }
}
