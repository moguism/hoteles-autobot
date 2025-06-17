import { Component, Input } from '@angular/core';
import { HotelService } from '../../models/hotel-service';
import { FormsModule } from '@angular/forms';
import { WishlistService } from '../../services/wishlist.service';

@Component({
  selector: 'app-wishlist-creator',
  imports: [FormsModule],
  templateUrl: './wishlist-creator.component.html',
  styleUrl: './wishlist-creator.component.css'
})
export class WishlistCreatorComponent {

  constructor(private wishlistService: WishlistService){}

  @Input() hotelService: HotelService | null = null

  desiredPrice: number = 0

  
  async addToWishlist()
  {
    await this.wishlistService.createWishlist(this.hotelService!!, this.desiredPrice);
  }
}
