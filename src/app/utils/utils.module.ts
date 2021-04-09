import { CommonModule } from '@angular/common';
import { NgModule } from '@angular/core';
import { SharedModule } from '../shared/shared.module';
import { ContainerPageUtilsComponent } from './container-page-utils/container-page-utils.component';


@NgModule({
  declarations: [
    ContainerPageUtilsComponent
  ],
  imports: [
    CommonModule,
    SharedModule
  ],
  exports: [
    ContainerPageUtilsComponent
  ]
})
export class UtilsModule { }
