import { Injectable } from '@angular/core';
import { Result } from '../models/result';
import { ApiService } from './api.service';
import { User } from '../models/user';
import { LoginRequest } from '../models/loginRequest';
import { LoginResponse } from '../models/loginResponse';

@Injectable({
  providedIn: 'root',
})
export class AuthService {
  private readonly USER_KEY = 'user';
  private readonly TOKEN_KEY = 'jwtToken';
  rememberMe: boolean = false;

  constructor(private api: ApiService) {
  }

  async login(
    authData: LoginRequest,
    rememberMe: boolean
  ): Promise<Result<LoginResponse>> {
    // Iniciar sesión
    const result = await this.api.post<LoginResponse>('login', authData);
    console.log("RESULT: ", result)
    this.rememberMe = rememberMe;

    if (result.success && result.data) {
      const loginResponse = result.data; // guardo info de la respuesta AuthResponse
      const accessToken = loginResponse.token;
      console.log(result.data)
      this.api.jwt = accessToken;

      if (rememberMe) {
        // Si se pulsó el botón recuérdame
        localStorage.setItem(this.TOKEN_KEY, accessToken);
      } else {
        sessionStorage.setItem(this.TOKEN_KEY, accessToken);
      }
    }

    return result;
  }

  public saveUser(user: User) {
    if (this.rememberMe) {
      localStorage.setItem(this.USER_KEY, JSON.stringify(user));
    } else {
      sessionStorage.setItem(this.USER_KEY, JSON.stringify(user));
    }
  }

  // Comprobar si el usuario esta logeado
  isAuthenticated(): boolean {
    const token =
      localStorage.getItem(this.TOKEN_KEY) ||
      sessionStorage.getItem(this.TOKEN_KEY);
    return !!token;
  }

  // Cerrar sesión
  logout(): void {
    sessionStorage.removeItem(this.TOKEN_KEY);
    localStorage.removeItem(this.TOKEN_KEY);
    sessionStorage.removeItem(this.USER_KEY);
    localStorage.removeItem(this.USER_KEY);
  }

  getUser(): User | null {
    const user =
      localStorage.getItem(this.USER_KEY) ||
      sessionStorage.getItem(this.USER_KEY);
    if (user) {
      return JSON.parse(user);
    }
    return null;
  }

  // Registro
  async register(data: any): Promise<Result<any>> {
    return this.api.post<any>('register', data);
  }
}
