import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { HeaderComponent } from './components/header/header.component';
import { FooterComponent } from './components/footer/footer.component';
import { HeaderLoginComponent } from './components/header-login/header-login.component';

@NgModule({ // ¡Asegúrate de que @NgModule esté aquí!
  declarations: [
    HeaderComponent,
    FooterComponent,
    HeaderLoginComponent,
  ],
  imports: [
    CommonModule
  ],
  exports: [
    HeaderComponent,
    FooterComponent,
    HeaderLoginComponent
  ]
})
export class SharedModule { }