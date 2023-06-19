import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { HttpClientModule } from "@angular/common/http";
import { HeaderComponent } from './core/header/header/header.component';
import { FooterComponent } from './core/footer/footer/footer.component';
import { CategoriesListComponent } from './modules/pages/categories/categories-list/categories-list.component';
import { Error4Component } from './modules/pages/error4/error4.component';
import { FormsModule } from '@angular/forms';
import { ProductsListComponent } from './modules/pages/products/products-list/products-list.component';

@NgModule({
  declarations: [
    AppComponent,
    HeaderComponent,
    FooterComponent,
    CategoriesListComponent,
    Error4Component,
    ProductsListComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule,
    FormsModule,
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
