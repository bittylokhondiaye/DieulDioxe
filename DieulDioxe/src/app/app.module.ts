import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { PartenaireComponent } from './partenaire/partenaire.component';
import { UserPartenaireComponent } from './user-partenaire/user-partenaire.component';
import { Routes, RouterModule } from '@angular/router';
import { HttpModule } from '@angular/http';

const routes: Routes = [
  { path: 'listerPartenaire', component: PartenaireComponent },
  { path: 'api/partenaires', component: PartenaireComponent}
];

@NgModule({
  declarations: [
    AppComponent,
    PartenaireComponent,
    UserPartenaireComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
