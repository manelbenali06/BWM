import {  NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { CategoriesListComponent } from './modules/pages/categories/categories-list/categories-list.component';
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

const routes: Routes = [
  {
    //localhost:4200
    path:'',
    component: HomeComponent
  },
  {
    //localhost:4200
    path:'product',
    component: ProductsListComponent
  },
  {
    //localhost:4200
    path:'category',
    component: CategoriesListComponent
  },
  {
    //localhost:4200
    path:'brows',
    component: BrowsComponent
  },
  {
    //localhost:4200
    path:'lips',
    component: LipsComponent
  },
  {
    //localhost:4200
    path:'freckless',
    component: FrecklessComponent
  },
  {
    //localhost:4200
    path:'nails',
    component: NailsComponent
  },
  {
    //localhost:4200
    path:'contact',
    component: ContactComponent
  },
  {
    //localhost:4200
    path:'register',
    component: RegisterComponent
  },
  {
    //localhost:4200
    path:'orders',
    component: OrdersComponent
  },
  {
    //localhost:4200
    path:'cart',
    component: CartComponent
  },


  {
    path:'**',
    redirectTo:"page/404",
    pathMatch:"full"
  }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
