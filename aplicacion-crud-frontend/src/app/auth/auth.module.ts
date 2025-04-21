import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { LoginComponent } from './components/login/login.component';
import { AuthRoutingModule } from './auth-routing.module'; // Asume que AuthRoutingModule ya configura las rutas

@NgModule({
  declarations: [
    LoginComponent
  ],
  imports: [
    CommonModule,
    AuthRoutingModule // Elimina RouterModule.forChild() si las rutas ya están en AuthRoutingModule
  ]
  // ¡No exports AuthModule ni AuthRoutingModule a menos que sea estrictamente necesario!
})
export class AuthModule { }