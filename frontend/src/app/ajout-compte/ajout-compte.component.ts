import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { PartenaireService } from '../partenaire.service';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';
import { Compte } from '../Compte.model';

@Component({
  selector: 'app-ajout-compte',
  templateUrl: './ajout-compte.component.html',
  styleUrls: ['./ajout-compte.component.css']
})
export class AjoutCompteComponent implements OnInit {
  errorMessage: any;
  compteForm: FormGroup;
  router: any;
  formBuilder= new FormBuilder;
  private partenaire= [];
 constructor( private http:HttpClient, private _partenaire:PartenaireService) { }

 ngOnInit() {
    this._partenaire.getPartenaire()
    .subscribe( data =>{
     this.partenaire = data
     console.log(data);
    });
    this.initForm();
 }

 initForm() {
  this.compteForm = this.formBuilder.group({
    MontantDeposer:['',Validators.required] ,
    Partenaire:['',Validators.required]
  });
}

  onSubmitForm() {
    const formValue = this.compteForm.value;
    const newCompte = new Compte(
    formValue['email'],
    formValue['password'],
      //formValue['imageName']
    );
  }


  
}
  

}
