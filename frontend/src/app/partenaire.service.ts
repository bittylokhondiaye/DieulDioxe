import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { IPartenaire } from './partenaire';
import { Observable } from 'rxjs';
import { Compte } from './Compte.model';
import { Compte2 } from './listerCompte.model';

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
 private urlajout:string = "http://localhost:8000/api/partenaires";
 private urlcompte:string = "http://localhost:8000/api/api/compte";
 private compteurl:string = "http://localhost:8000/api/listerCompte";
 private depoturl:string = "http://localhost:8000/api/depot";


  injector: any;
  req:any;
  next:any;
  constructor( private http:HttpClient) { }

  
  getPartenaire() : Observable<IPartenaire[]>  {
   return  this.http.get<IPartenaire[]>(this.url);
  }

  postUser(myDatas) {
    let  headers = new HttpHeaders().set('Authorization', "Bearer " + localStorage.getItem('token'));
    return this.http.post(this.urlajout,myDatas,{headers},).subscribe(res => {
      console.log(res);
  });
  }

  postCompte(donnees) {
    let  headers = new HttpHeaders().set('Authorization', "Bearer " + localStorage.getItem('token'));
    return this.http.post(this.urlcompte,donnees,{headers},).subscribe(res => {
      console.log(res)
    });
  }

  getCompte(): Observable<Compte2[]>{
    return  this.http.get<Compte2[]>(this.compteurl);
  }

  postDepot(donnees) {
    let  headers = new HttpHeaders().set('Authorization', "Bearer " + localStorage.getItem('token'));
    const data={
      Compte:donnees.Compte,
      Montant: donnees.Montant
    }
    return this.http.post(this.depoturl,data,{headers},).subscribe(res => {
      console.log(res)
    });                                                                                                                                                                                                                                                                                                                                                             
  }
}
