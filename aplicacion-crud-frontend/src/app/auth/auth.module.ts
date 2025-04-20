import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule, Routes } from '@angular/router';
import { LoginComponent } from './components/login/login.component';
import { AuthRoutingModule } from './auth-routing.module';

const routes: Routes = [
  {
    path: 'login',
    component: LoginComponent
  },
  {
    path: '',
    redirectTo: 'login',
    pathMatch: 'full'
  }
];

@NgModule({ // ¡Asegúrate de que @NgModule esté aquí!
  declarations: [
    LoginComponent
  ],
  imports: [
    CommonModule,
    RouterModule.forChild(routes),
    AuthRoutingModule // Asegúrate de que AuthRoutingModule esté importado
  ],
  exports: [
    AuthRoutingModule,
    AuthModule // También puedes exportar el módulo si es necesario
  ]
})
export class AuthModule { }