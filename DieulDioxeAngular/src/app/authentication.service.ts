import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { markParentViewsForCheckProjectedViews } from '@angular/core/src/view/util';
import { JwtHelperService } from '@auth0/angular-jwt';

@Injectable({
  providedIn: 'root'
})
export class AuthenticationService {

  host2:string="http://localhost:8000/api/login_check";
  jwt:string;
  username:string;
  roles:Array<string>;

  constructor( private http:HttpClient) { }

  login(data){
    /* this.parseJWT(); */
    return this.http.post(this.host2,data,{observe:'response'})
  }

  saveToken(jwt:string){
    localStorage.setItem('token',jwt);
    this.jwt=jwt;
    this.parseJWT();
  }

  parseJWT(){
    let jwtHelper= new JwtHelperService();
    let objJWT=jwtHelper.decodeToken(this.jwt);
    this.username=objJWT.obj;
    this.roles=objJWT.roles;
  }

  isAdmin(){
    return this.roles.indexOf('ADMIN')>=0;
  }

  isUser(){
    return this.roles.indexOf('USER')>=0;
  }

  isSuperAdmin(){
    return this.roles.indexOf('SUPER_ADMIN')>=0;
  }

  isAuthenticated(){
    return this.roles && (this.isAdmin || this.isUser || this.isSuperAdmin );
  }
}
