import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { LoginComponent } from './login/login.component';
import { FormsModule } from '@angular/forms';
import { HttpClientModule, HTTP_INTERCEPTORS }  from '@angular/common/http'
import { AuthenticationService } from './authentication.service';
import { JwtModule } from '@auth0/angular-jwt';
import { PartenaireComponent } from './partenaire/partenaire.component';
import { TokenInterceptorService } from './token-interceptor.service';
import { PartenaireService } from './partenaire.service';
import {BrowserAnimationsModule} from '@angular/platform-browser/animations';
import { UserComponent } from './user/user.component';
import {MatButtonModule} from '@angular/material/button';
import {MatCheckboxModule} from '@angular/material/checkbox';

@NgModule({
  declarations: [
    AppComponent,
    LoginComponent,
    PartenaireComponent,
    UserComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    FormsModule,
    HttpClientModule,
    JwtModule,
    BrowserAnimationsModule,
    MatButtonModule,
    MatCheckboxModule
  ],
  providers: [AuthenticationService,PartenaireService/* ,{
    provide:HTTP_INTERCEPTORS,
    useClass: TokenInterceptorService,
    multi: true 
  } */],
  bootstrap: [AppComponent]
})
export class AppModule { }