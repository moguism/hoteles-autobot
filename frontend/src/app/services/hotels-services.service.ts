import { Injectable } from '@angular/core';
import { ApiService } from './api.service';
import { Hotel } from '../models/hotel';
import { Service } from '../models/service';

@Injectable({
  providedIn: 'root'
})
export class HotelsServicesService {

  constructor(private api: ApiService) { }

  async getAllHotels()
  {
    const result = await this.api.get<Hotel[]>("hotels")
    return result.data || []
  }

  async getAllServices()
  {
    const result = await this.api.get<Service[]>("services")
    return result.data || []
  }

  async getHotelById(id: number)
  {
    const result = await this.api.get<Hotel>(`hotels/${id}`)
    return result.data
  }

  async getServiceById(id: number)
  {
    const result = await this.api.get<Service>(`services/${id}`)
    return result.data
  }
}
