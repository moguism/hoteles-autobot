import { Component, OnInit, ViewChild, AfterViewInit } from '@angular/core';
import { AuthService } from '../../services/auth.service';
import { HotelsServicesService } from '../../services/hotels-services.service';
import { ActivatedRoute } from '@angular/router';
import { Subscription } from 'rxjs';
import { Hotel } from '../../models/hotel';
import { HotelService } from '../../models/hotel-service';
import { WishlistCreatorComponent } from '../../components/wishlist-creator/wishlist-creator.component';
import { CustomRouterService } from '../../services/custom-router.service';
import { Chart, CategoryScale, LinearScale, LineController, PointElement, LineElement, Title, Tooltip, Legend } from 'chart.js'; 

// Para que chart.js furule
Chart.register(CategoryScale, LinearScale, LineController, PointElement, LineElement, Title, Tooltip, Legend);

@Component({
  selector: 'app-hotel-view',
  imports: [WishlistCreatorComponent],
  templateUrl: './hotel-view.component.html',
  styleUrl: './hotel-view.component.css'
})
export class HotelViewComponent implements OnInit, AfterViewInit {

  @ViewChild('priceChart', { static: false }) priceChartCanvas: any

  id: number = 0;
  routeParamMap$: Subscription | null = null;
  hotel: Hotel | null = null;
  selectedService: HotelService | null = null;
  openWishlistCreator: boolean = false;

  priceChart: any; // Instancia del gráfico

  constructor(
    public authService: AuthService, 
    private hotelsServicesService: HotelsServicesService,
    private activatedRoute: ActivatedRoute,
    private router: CustomRouterService
  ) {}

  async ngOnInit(): Promise<void> {
    this.routeParamMap$ = this.activatedRoute.paramMap.subscribe(async paramMap => {
        this.id = paramMap.get('id') as unknown as number
        await this.getHotel()
    });
  }

  ngAfterViewInit(): void {
    // Si no tiene el retraso peta for some reason
    setTimeout(() => {
      this.updatePriceChart()
    }, 1000)
  }

  async getHotel() {
    this.hotel = await this.hotelsServicesService.getHotelById(this.id)

    if (this.hotel == null) {
      this.router.navigateToUrl("")
      return
    }

    this.selectedService = this.hotel.services[0]
    this.updatePriceChart()
  }

  changeSelectedService(hotelService: HotelService) {
    this.selectedService = hotelService;
  }

  updatePriceChart() {
    if (!this.priceChartCanvas) {
      console.warn('El canvas no está disponible aún')
      return
    }

    if (!this.hotel || this.hotel.services.length == 0) {
      return
    }

    console.log("HOTEL: ", this.hotel)

    const service = this.hotel.services[0]
    const labels = service.date_prices.map((datePrice) => datePrice.date)
    const data = service.date_prices.map((datePrice) => datePrice.price)

    const chartData = {
      labels: labels,
      datasets: [{
        label: 'Evolución de precios',
        data: data,
        fill: false,
        borderColor: 'rgb(75, 192, 192)',
        tension: 0.1
      }]
    };

    // Se tiene que re destruir para que no falle
    if (this.priceChart) {
      this.priceChart.destroy()
    }

    this.priceChart = new Chart(this.priceChartCanvas.nativeElement, {
      type: 'line',
      data: chartData,
      options: {
        responsive: true,
        scales: {
          x: {
            type: 'category',
            title: {
              display: true,
              text: 'Fecha'
            }
          },
          y: {
            type: 'linear',
            title: {
              display: true,
              text: 'Precio'
            },
            beginAtZero: false
          }
        }
      }
    });
  }
}
