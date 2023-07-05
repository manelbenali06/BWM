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
import { PaymentComponent } from './modules/pages/payment/payment.component';
import { RedirectComponent } from './modules/pages/redirect/redirect.component';
import { CancelComponent } from './modules/pages/cancel/cancel.component';
import { SuccesComponent } from './modules/pages/succes/succes.component';

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
    PaymentComponent,
    RedirectComponent,
    CancelComponent,
    SuccesComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule,
    FormsModule,
    ReactiveFormsModule,
  ],
  providers: [CartService],
  bootstrap: [AppComponent]
})
export class AppModule { }
