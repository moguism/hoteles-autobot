import { Injectable } from '@angular/core';
import { ApiService } from './api.service';
import { User } from '../models/user';
import { UpdateUserRequest } from '../models/update-user-request';

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

  async updateUser(formData: UpdateUserRequest): Promise<any>
  {
    const response = await this.api.put("user", formData)
    return true ? response.statusCode == 200 : false
  }
}
