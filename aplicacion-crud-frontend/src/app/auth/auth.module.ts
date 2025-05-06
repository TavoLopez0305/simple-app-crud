import { NgModule } from '@angular/core';
import { CommonModule, IMAGE_CONFIG } from '@angular/common';
import { LoginComponent } from './components/login/login.component';
import { RegisterComponent } from './components/register/register.component';
import { AuthRoutingModule } from './auth-routing.module';

@NgModule({
  declarations: [
    LoginComponent,
    RegisterComponent,
  ],
  imports: [
    CommonModule,
    AuthRoutingModule // Elimina RouterModule.forChild() si las rutas ya están en AuthRoutingModule
  ]
  // ¡No exports AuthModule ni AuthRoutingModule a menos que sea estrictamente necesario!
})
export class AuthModule { }