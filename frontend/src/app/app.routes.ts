import { Routes } from '@angular/router';
import { ChatComponent } from './pages/chat/chat.component';
import { LoginComponent } from './pages/login/login.component';
import { ProfileComponent } from './pages/profile/profile.component';
import { HomeComponent } from './pages/home/home.component';
import { HotelsServicesListComponent } from './pages/hotels-services-list/hotels-services-list.component';
import { HotelViewComponent } from './pages/hotel-view/hotel-view.component';

export const routes: Routes = [
    {path: "", component: HomeComponent},
    {path: "login", component: LoginComponent},
    {path: "chat", component: ChatComponent},
    { path: 'profile', component: ProfileComponent },
    { path: 'hotels-services', component: HotelsServicesListComponent },
    { path: 'hotel/:id', component: HotelViewComponent},
];
