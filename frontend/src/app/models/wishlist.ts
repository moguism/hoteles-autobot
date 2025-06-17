import { HotelService } from "./hotel-service";
import { User } from "./user";

export interface Wishlist {
    id: number,
    desiredPrice: number,
    user: User,
    hotelService: HotelService
}
