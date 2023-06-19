import {  NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { CategoriesListComponent } from './modules/pages/categories/categories-list/categories-list.component';

const routes: Routes = [
  {
    //localhost:4200
    path:':category',
    component: CategoriesListComponent
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
