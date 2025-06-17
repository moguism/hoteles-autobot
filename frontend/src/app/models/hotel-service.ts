import { Hotel } from "./hotel";
import { Service } from "./service";

export interface HotelService {
    hotel: Hotel,
    service: Service,
    price: number,
    date: Date
}
