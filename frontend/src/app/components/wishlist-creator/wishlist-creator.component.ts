import { Component, Input } from '@angular/core';
import { HotelService } from '../../models/hotel-service';
import { FormsModule } from '@angular/forms';
import { WishlistService } from '../../services/wishlist.service';
import { SweetalertService } from '../../services/sweetalert.service';

@Component({
  selector: 'app-wishlist-creator',
  imports: [FormsModule],
  templateUrl: './wishlist-creator.component.html',
  styleUrl: './wishlist-creator.component.css'
})
export class WishlistCreatorComponent {

  constructor(private wishlistService: WishlistService, private sweetAlertService: SweetalertService){}

  @Input() hotelService: HotelService | null = null

  desiredPrice: number = 0

  
  async addToWishlist()
  {
    const result = await this.wishlistService.createWishlist(this.hotelService!!, this.desiredPrice);
    if(result)
    {
      this.sweetAlertService.showAlert("Éxito", "Wishlist creada correctamente", 'success')
    }
    else
    {
      this.sweetAlertService.showAlert("Error", "Ha ocurrido un error", 'error')
    }
  }
}
