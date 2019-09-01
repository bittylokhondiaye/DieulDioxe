import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { LoginComponent } from './login/login.component';
import { PartenaireComponent } from './partenaire/partenaire.component';
import { AjoutPartenaireComponent } from './ajout-partenaire/ajout-partenaire.component';
import { AjoutUserComponent } from './ajout-user/ajout-user.component';

const routes: Routes = [
  { path:"login" , component:LoginComponent},
  { path:"listerPartenaire" , component:PartenaireComponent},
  { path:"ajoutPartenaire" , component:AjoutPartenaireComponent},
  { path:"ajoutUser" , component:AjoutUserComponent}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }