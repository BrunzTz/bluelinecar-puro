import { Routes } from '@angular/router';
import { CadastroComponent } from './pages/cadastro/cadastro.component';
import { HomeComponent } from './pages/home/home.component';

export const AppRouting: Routes = [
  {
    path: '', 
    component: HomeComponent
  },
  {
    path: 'signup', 
    component: CadastroComponent
  }
]
