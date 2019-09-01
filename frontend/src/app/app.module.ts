import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { LoginComponent } from './login/login.component';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
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
import { MatButtonToggleModule,MatIconModule,MatToolbarModule,MatCardModule,MatInputModule
        ,MatFormFieldModule,MatOptionModule  } from '@angular/material';
import { AjoutPartenaireComponent } from './ajout-partenaire/ajout-partenaire.component';
import { AjoutUserComponent } from './ajout-user/ajout-user.component';
import {MatSelectModule} from '@angular/material/select';
import { AjoutCompteComponent } from './ajout-compte/ajout-compte.component';


@NgModule({
  declarations: [
    AppComponent,
    LoginComponent,
    PartenaireComponent,
    UserComponent,
    AjoutPartenaireComponent,
    AjoutUserComponent,
    AjoutCompteComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    FormsModule,
    HttpClientModule,
    JwtModule,
    BrowserAnimationsModule,
    MatButtonModule,
    MatCheckboxModule,
    ReactiveFormsModule,
    MatButtonToggleModule,
    MatIconModule,
    MatToolbarModule,
    MatCardModule,
    MatInputModule,
    MatFormFieldModule,
    MatOptionModule,
    MatSelectModule
  ],
  providers: [AuthenticationService,PartenaireService/* ,{
    provide:HTTP_INTERCEPTORS,
    useClass: TokenInterceptorService,
    multi: true 
  } */],
  bootstrap: [AppComponent]
})
export class AppModule { }