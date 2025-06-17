import { HotelService } from "./hotel-service";
import { User } from "./user";

export interface Wishlist {
    id: number,
    desired_price: number,
    user: User,
    hotel_service: HotelService
}
