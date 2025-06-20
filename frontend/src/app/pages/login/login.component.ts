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
import { SweetalertService } from '../../services/sweetalert.service';


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
    private sweetAlertService: SweetalertService
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
      return
    }

    const container = document.querySelector(".container")
    const sign_in_button = document.getElementById("btn-sign-in")
    const sign_up_button = document.getElementById("btn-sign-up")

    if (sign_in_button != null) {
      sign_in_button.addEventListener("click", () => {
        if (container != null)
          container.classList.remove("toggle");
      });
    }

    if (sign_up_button != null) {
      sign_up_button.addEventListener("click", () => {
        if (container != null)
          container.classList.add("toggle");
      });
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

      this.sweetAlertService.showAlert("Éxito", "Inicio de sesión exitoso", 'success');

      this.router.navigateByUrl('profile');
    } else {
      this.sweetAlertService.showAlert("Error", "Datos incorrectos", 'error');
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
        this.sweetAlertService.showAlert("Verifica tu cuenta", "Te hemos enviado un mail para que verifiques tu cuenta antes de continuar", 'info');
        this.router.navigateByUrl("")
      }
    }
  }
}
