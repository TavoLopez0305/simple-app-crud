import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { AppComponent } from './app.component';
import { AppRoutingModule } from './app-routing.module';
import { HomeComponent } from './home/home.component';
import { SharedModule } from './shared/shared.module'; // ¡Asegúrate de importar SharedModule!

@NgModule({
  declarations: [AppComponent, HomeComponent],
  imports: [
    BrowserModule,
    AppRoutingModule,
    SharedModule // ¡Esta línea es crucial para que HomeComponent use HeaderComponent y FooterComponent!
  ],
  bootstrap: [AppComponent]
})
export class AppModule {}