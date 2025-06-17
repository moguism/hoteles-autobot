import { HotelService } from "./hotel-service";

export interface Service {
    id: number,
    name: string,
    hotels: HotelService[]
}
