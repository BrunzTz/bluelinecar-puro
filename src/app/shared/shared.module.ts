import { CommonModule } from '@angular/common';
import { NgModule } from '@angular/core';
import { BsDropdownModule } from 'ngx-bootstrap/dropdown';
import { FooterComponent } from './footer/footer.component';
import { JumbtronComponent } from './jumbtron/jumbtron.component';
import { ModelosComponent } from './modelos/modelos.component';
import { NavbarComponent } from './navbar/navbar.component';


@NgModule({
  declarations: [
    NavbarComponent,
    JumbtronComponent,
    ModelosComponent,
    FooterComponent
  ],
  imports: [
    CommonModule,
    BsDropdownModule.forRoot()
  ],
  exports:[
    NavbarComponent,
    JumbtronComponent,
    ModelosComponent,
    FooterComponent
  ]
})
export class SharedModule { }
