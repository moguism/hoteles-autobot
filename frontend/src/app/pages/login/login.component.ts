import { Component } from '@angular/core';
import {
  FormBuilder,
  FormGroup,
  FormsModule,
  ReactiveFormsModule,
  Validators,
} from '@angular/forms';
import { Router } from '@angular/router';
import { CommonModule, NgIf } from '@angular/common';
import { AuthService } from '../../services/auth.service';
import { PasswordValidatorService } from '../../services/password-validator.service';


@Component({
  selector: 'app-login',
  standalone: true,
  imports: [
    CommonModule,
    FormsModule,
    ReactiveFormsModule,
  ],
  templateUrl: './login.component.html',
  styleUrl: './login.component.css',
})
export class LoginComponent {
  menuSeleccion: 'login' | 'register' = 'register';

  emailOrNickname: string = '';
  password: string = '';
  rememberMe: boolean = false;
  jwt: string = '';

  registerForm: FormGroup;

  image: File | null = null;

  imgSeleccionada: Boolean = false;

  imagePreview!: string;

  pressedEnter: Boolean = false;

  constructor(
    private formBuilder: FormBuilder,
    private router: Router,
    private authService: AuthService,
    private passwordValidator: PasswordValidatorService,
  ) {
    this.registerForm = this.formBuilder.group(
      {
        nickname: ['', Validators.required],
        email: [
          '',
          [
            Validators.required,
            Validators.email,
            Validators.pattern(
              /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/
            ),
          ],
        ],
        newPassword: ['', [Validators.required, Validators.minLength(6)]],
        confirmPassword: ['', Validators.required],
      },
      { validators: this.passwordValidator.passwordMatchValidator }
    );
  }

  async ngOnInit() {
    if (this.authService.isAuthenticated()) {
      this.router.navigateByUrl('profile');
    }
  }

  async login() {
    if (this.pressedEnter) return;
    this.pressedEnter = true;

    const authData = {
      email: this.emailOrNickname,
      password: this.password,
    };
    const result = await this.authService.login(authData, this.rememberMe);

    if (result.success) {
      if (result.data) {
        this.jwt = result.data.token;
      } else {
        console.error('No se encontró información en result.data');
      }

      if (this.rememberMe) {
        localStorage.setItem('jwtToken', this.jwt);
      }

      alert("Inicio de sesión exitoso");

      this.router.navigateByUrl('profile');
    } else {
      alert("Ha ocurrido un error")
      this.pressedEnter = false;
    }
  }

  // Registro
  async register() {
    if (this.pressedEnter) return;
    this.pressedEnter = true;

    if (this.registerForm.valid) {
      const formUser = this.registerForm.value;

      const registerPayload = {
        name: formUser.nickname,
        email: formUser.email,
        password: formUser.newPassword,
      };

      const registerResult = await this.authService.register(registerPayload);

      if (registerResult.success) {
        const email = this.registerForm.value.email;

        this.router.navigate(['/checkEmail'], {
          state: { email },
        });
      }
    }
  }
}
