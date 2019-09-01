import { Component, OnInit, ViewChild } from '@angular/core';
import { AuthenticationService } from './authentication.service';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent implements OnInit {
  
  @ViewChild('clickMe') clickMe: any;

  clickOnHover() {
    this.clickMe._elementRef.nativeElement.click();
  }
  
  title = 'DieulDioxeAngular';

  constructor(private authService:AuthenticationService){}

  ngOnInit(): void {
    this.authService.loadToken();
  }

  isAdmin(){
    return this.authService.isAdmin();
  }

  isUser(){
    return this.authService.isUser();
  }

  isSuperAdmin(){
    return this.authService.isSuperAdmin();
  }

  isAuthenticated(){
    return this.authService.isAuthenticated;
  }
}