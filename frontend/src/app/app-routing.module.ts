import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { LoginComponent } from './login/login.component';
import { PartenaireComponent } from './partenaire/partenaire.component';

const routes: Routes = [
  { path:"login" , component:LoginComponent},
  { path:"listerPartenaire" , component:PartenaireComponent}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }