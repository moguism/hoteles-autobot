import { HotelService } from "./hotel-service";

export interface Hotel {
    id: number,
    name: string,
    address: string,
    services: HotelService[]
}
