import { Injectable } from '@angular/core';
import { ApiService } from './api.service';
import { HotelService } from '../models/hotel-service';
import { WishlistRequest } from '../models/wishlist-request';

@Injectable({
  providedIn: 'root'
})
export class WishlistService {

  constructor(private api: ApiService) { }

  async createWishlist(hotelService: HotelService, desiredPrice: number)
  {
    const wishlist: WishlistRequest = {
      "price": desiredPrice,
      "hotel_service_id": hotelService.id
    }

    const response = await this.api.post("wishlist/create", wishlist)
    return response.success
  }

  async deleteWishlist(wislistId: number)
  {
    const response = await this.api.delete(`wishlist/${wislistId}`)
    return response
  }
}
