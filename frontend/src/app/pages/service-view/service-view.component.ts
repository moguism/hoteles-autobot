import { Component, OnInit } from '@angular/core';
import { Subscription } from 'rxjs';
import { ActivatedRoute } from '@angular/router';
import { AuthService } from '../../services/auth.service';
import { HotelsServicesService } from '../../services/hotels-services.service';
import { Service } from '../../models/service';
import { WishlistCreatorComponent } from '../../components/wishlist-creator/wishlist-creator.component';

@Component({
  selector: 'app-service-view',
  imports: [WishlistCreatorComponent],
  templateUrl: './service-view.component.html',
  styleUrl: './service-view.component.css'
})
export class ServiceViewComponent implements OnInit {

  constructor(
    public authService: AuthService, 
    private hotelsServicesService: HotelsServicesService,
    private activatedRoute: ActivatedRoute,
  ) {}

  id: number = 0;
  routeParamMap$: Subscription | null = null;
  service: Service | null = null;
  openWishlistCreator: boolean = false

  async ngOnInit(): Promise<void> 
  {
    this.routeParamMap$ = this.activatedRoute.paramMap.subscribe(async paramMap => {
        this.id = paramMap.get('id') as unknown as number;
        await this.getService()
    })
  }

  async getService()
  {
    this.service = await this.hotelsServicesService.getServiceById(this.id)
  }
  
}
