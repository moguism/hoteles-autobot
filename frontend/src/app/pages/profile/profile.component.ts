import { Component, OnInit } from '@angular/core';
import { User } from '../../models/user';
import { CustomRouterService } from '../../services/custom-router.service';
import { UserService } from '../../services/user.service';
import { AuthService } from '../../services/auth.service';
import {
  FormBuilder,
  FormGroup,
  ReactiveFormsModule,
  Validators,
} from '@angular/forms';
import { PasswordValidatorService } from '../../services/password-validator.service';
import { CommonModule } from '@angular/common';
import { SweetalertService } from '../../services/sweetalert.service';
import { ChartModule } from 'primeng/chart';
import { ChatComponent } from '../../components/chat/chat.component';
import { UpdateUserRequest } from '../../models/update-user-request';
import { WishlistService } from '../../services/wishlist.service';

@Component({
  selector: 'app-profile',
  standalone: true,
  imports: [
    ChatComponent,
    ReactiveFormsModule,
    CommonModule,
    ChartModule,
  ],
  templateUrl: './profile.component.html',
  styleUrl: './profile.component.css',
})
export class ProfileComponent implements OnInit {
  constructor(
    private userService: UserService,
    private authService: AuthService,
    private router: CustomRouterService,
    private formBuild: FormBuilder,
    private passwordValidator: PasswordValidatorService,
    public customRouter: CustomRouterService,
    private sweetAlertService: SweetalertService,
    private wishlistService: WishlistService
  ) {
    this.userForm = this.formBuild.group({
      name: ['', Validators.required],
      email: ['', [Validators.required, Validators.email]],
    });

    this.passwordForm = this.formBuild.group(
      {
        newPassword: ['', [Validators.required, Validators.minLength(6)]],
        confirmPassword: ['', Validators.required],
      },
      { validators: this.passwordValidator.passwordMatchValidator }
    );
  }

  user: User | null = null;

  userForm: FormGroup;
  passwordForm: FormGroup;
  isNewPasswordHidden = true; // Mostrar div de cambiar contraseña
  isEditing = false; //modo edición

  async ngOnInit() {
    if (!this.authService.isAuthenticated()) {
      this.router.navigateToUrl('login');
      return
    }
    await this.getCurrentUser();
  }

  async getCurrentUser() {
    this.user = await this.userService.getCurrentUser();
    if(this.user == null)
    {
      this.router.navigateToUrl('login')
      return;
    }

    this.authService.saveUser(this.user);
    this.userForm.reset(this.user);
  }

  logOut() {
    this.authService.logout();
    this.customRouter.navigateToUrl('/');
  }

  async updateUser(): Promise<void> {
    let shouldReload = false;

    const nickname = this.userForm.value.name;
    const mail = this.userForm.value.email;

    if (this.user!!.email != mail) {
      shouldReload = true;
    }

    const newPassword = this.passwordForm.get('newPassword')?.value;

    if (newPassword) {
      if (!this.passwordForm.valid) {
        console.error('Error: La nueva contraseña no es válida.');
        return;
      }
      shouldReload = true;
    }

    const updateUserRequest: UpdateUserRequest = {
      name: nickname,
      email: mail,
      password: newPassword
    }

    const couldUpdate = await this.userService.updateUser(updateUserRequest);
    if (couldUpdate) {
      if(shouldReload)
      {
        this.sweetAlertService.showAlert(
          'Info',
          "Cerrando sesión",
          'info'
        );
        this.logOut(); // Recargo siempre
        return
      }
      await this.getCurrentUser()
    }
    else
    {
      this.sweetAlertService.showAlert(
        'Error',
        "Ha ocurrido un error, probablemente porque el mail ya está en uso",
        'error'
      )
    }

    this.edit();
  }

  edit() {
    this.isEditing = !this.isEditing;
    this.isNewPasswordHidden = !this.isNewPasswordHidden;
    if (!this.isEditing) {
      // restaura los datos
      this.userForm.reset(this.user);
      this.passwordForm.reset();
    }
  }

  editPassword() {
    const newPassword = this.passwordForm.get('newPassword')?.value;

    if (!newPassword) {
      console.error('Error: El campo de la contraseña está vacío.');
      return;
    }
  }

  async deleteWishlist(wishlistId: number)
  {
    await this.wishlistService.deleteWishlist(wishlistId)
    await this.getCurrentUser()
  }
}
