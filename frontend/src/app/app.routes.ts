import { Routes } from '@angular/router';
import { ChatComponent } from './pages/chat/chat.component';

export const routes: Routes = [
    // Esto ya lo cambiaré para que chat no sea el inicio
    {path: "", component: ChatComponent}
];
