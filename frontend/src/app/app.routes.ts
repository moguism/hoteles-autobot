import { Routes } from '@angular/router';
import { LoginComponent } from './pages/login/login.component';
import { ProfileComponent } from './pages/profile/profile.component';
import { HotelsServicesListComponent } from './pages/hotels-services-list/hotels-services-list.component';
import { HotelViewComponent } from './pages/hotel-view/hotel-view.component';

export const routes: Routes = [
    {path: "login", component: LoginComponent},
    { path: 'profile', component: ProfileComponent },
    { path: "", component: HotelsServicesListComponent },
    { path: 'hotel/:id', component: HotelViewComponent},
];
