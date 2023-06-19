import {  NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { CategoriesListComponent } from './modules/pages/categories/categories-list/categories-list.component';
import { ProductsListComponent } from './modules/pages/products/products-list/products-list.component';

const routes: Routes = [
  {
    //localhost:4200
    path:':category',
    component: CategoriesListComponent
  },
  {
    //localhost:4200
    path:':product',
    component: ProductsListComponent
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
