import { Component, OnInit } from '@angular/core';
import { AuthService } from '../../services/auth.service';
import { User } from '../../models/user';
import { CustomRouterService } from '../../services/custom-router.service';
import { UserService } from '../../services/user.service';
import { WishlistService } from '../../services/wishlist.service';

@Component({
  selector: 'app-profile',
  imports: [],
  templateUrl: './profile.component.html',
  styleUrl: './profile.component.css'
})
export class ProfileComponent implements OnInit {

  constructor(
    private authService: AuthService, 
    public router: CustomRouterService,
    private userService: UserService,
    private wishlistService: WishlistService
  ){}

  user: User | null = null

  async ngOnInit()
  {
    if(!this.authService.isAuthenticated())
    {
      this.router.navigateToUrl("login")
      return
    }

    await this.getUser();
  }

  async getUser()
  {
    this.user = await this.userService.getCurrentUser()
    if(this.user == null)
    {
      this.authService.logout()
      this.router.navigateToUrl("login")
      return
    }

    this.authService.saveUser(this.user)
  }

  async deleteWishlist(wishlistId: number)
  {
    await this.wishlistService.deleteWishlist(wishlistId)
    await this.getUser()
  }

}
