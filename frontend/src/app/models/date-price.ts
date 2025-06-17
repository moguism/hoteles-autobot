import { HotelService } from "./hotel-service";

export interface DatePrice {
    id: number,
    hotelService: HotelService,
    price: number,
    date: Date
}
