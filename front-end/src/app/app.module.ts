import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { ReactiveFormsModule } from '@angular/forms'; // Import ReactiveFormsModule
import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { HttpClientModule } from "@angular/common/http";
import { HeaderComponent } from './core/header/header/header.component';
import { FooterComponent } from './core/footer/footer/footer.component';
import { CategoriesListComponent } from './modules/pages/categories/categories-list/categories-list.component';
import { Error4Component } from './modules/pages/error4/error4.component';
import { FormsModule } from '@angular/forms';
import { ProductsListComponent } from './modules/pages/products/products-list/products-list.component';
import { HomeComponent } from './modules/pages/home/home.component';
import { BrowsComponent } from './modules/pages/brows/brows.component';
import { LipsComponent } from './modules/pages/lips/lips.component';
import { FrecklessComponent } from './modules/pages/freckless/freckless.component';
import { NailsComponent } from './modules/pages/nails/nails.component';
import { ContactComponent } from './modules/pages/contact/contact.component';
import { RegisterComponent } from './modules/pages/register/register.component';
import { OrdersComponent } from './modules/pages/orders/orders.component';
import { CartComponent } from './modules/pages/cart/cart.component';
import { CartService } from './core/http/cart/cart.service';
import { LoginComponent } from './modules/pages/login/login.component';

//import  { StripeModule }  from  "stripe-angular"

@NgModule({
  declarations: [
    AppComponent,
    HeaderComponent,
    FooterComponent,
    CategoriesListComponent,
    Error4Component,
    ProductsListComponent,
    HomeComponent,
    BrowsComponent,
    LipsComponent,
    FrecklessComponent,
    NailsComponent,
    ContactComponent,
    RegisterComponent,
    OrdersComponent,
    CartComponent,
    LoginComponent


  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule,
    FormsModule,
    ReactiveFormsModule,
   // StripeModule.forRoot("pk_test_51K4ktlDXeRuhLI1lO2hM9XGHupAhMPI2OlAu4TComvYY0qnSUwg1pOeTc6ko4SlunkGz3OQKp9Fcjfdj1ddUjd9E00TMNLaoqj")
  ],
  providers: [CartService],
  bootstrap: [AppComponent]
})
export class AppModule { }
