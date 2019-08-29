import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { IPartenaire } from './partenaire';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class PartenaireService {

  /* id:number;
  Prenom:Text;
  Nom:Text;
  Telephone: number;
  CNI: number;
  NINEA: string;
  Adresse: string;
  RaisonSocial: string;
  Email:string; */

 private url:string = "http://localhost:8000/api/listerPartenaire";
  constructor( private http:HttpClient) { }

  
  getPartenaire() : Observable<IPartenaire[]>  {
   return  this.http.get<IPartenaire[]>(this.url);
}

}