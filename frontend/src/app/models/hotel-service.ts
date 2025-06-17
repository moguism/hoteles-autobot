import { DatePrice } from "./date-price";
import { Hotel } from "./hotel";
import { Service } from "./service";

export interface HotelService {
    id: number,
    hotel: Hotel,
    service: Service,
    date_prices: DatePrice[]
}
