import { HotelService } from "./hotel-service";

export interface Hotel {
    id: number,
    name: string,
    address: string,
    xotelo_hotel_key: string,
    xotelo_photo_url: string,
    xotelo_hotel_url: string,
    services: HotelService[]
}
