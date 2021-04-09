import { CommonModule } from '@angular/common';
import { NgModule } from '@angular/core';
import { SharedModule } from '../shared/shared.module';
import { UtilsModule } from '../utils/utils.module';
import { CadastroComponent } from './cadastro/cadastro.component';
import { HomeComponent } from './home/home.component';

@NgModule({
  declarations: [
    HomeComponent,
    CadastroComponent
  ],
  imports: [
    CommonModule,
    SharedModule,
    UtilsModule
  ],
  exports: [
    HomeComponent,
    CadastroComponent
  ]
})
export class PagesModule { }
