import { Routes } from '@angular/router';
import { ChatComponent } from './pages/chat/chat.component';
import { LoginComponent } from './pages/login/login.component';
import { CheckEmailComponent } from './pages/check-email/check-email.component';
import { ProfileComponent } from './pages/profile/profile.component';
import { HomeComponent } from './pages/home/home.component';

export const routes: Routes = [
    {path: "", component: HomeComponent},
    {path: "login", component: LoginComponent},
    {path: "chat", component: ChatComponent},
    { path: 'checkEmail', component: CheckEmailComponent },
    { path: 'profile', component: ProfileComponent },
];
