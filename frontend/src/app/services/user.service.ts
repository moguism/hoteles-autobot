import { Injectable } from '@angular/core';
import { ApiService } from './api.service';
import { User } from '../models/user';

@Injectable({
  providedIn: 'root'
})
export class UserService {

  constructor(private api: ApiService) { }

  async getCurrentUser()
  {
    const response = await this.api.get<User>("user")
    console.log("RESPONSE USER: ", response)
    return response.data
  }
}
