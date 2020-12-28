import { Component, OnInit } from '@angular/core';
import { FormGroup, FormControl, Validators } from '@angular/forms';
import { Router } from '@angular/router';
import { FormserviceService } from 'src/app/service/formservice.service';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss']
})
export class LoginComponent implements OnInit {
  loginForm = new FormGroup({
    name: new FormControl(''),
    password: new FormControl('')
  });

  successmsg = false;
  errormsg = false;
  returndata: any={};


  constructor( private dataservice:FormserviceService,private router: Router,
    ) { 
   
  }

  ngOnInit(): void {

  
  }

  checkLogin()
  {
    this.successmsg = false;
    this.errormsg = false;
    this.dataservice.Authdata(this.loginForm.value).subscribe(data=>{
    this.errormsg = false;
    this.returndata =data;
    this.successmsg=true;
    // console.log(this.returndata.data[0]);
    sessionStorage.setItem("email", this.returndata.data[0].email);
    sessionStorage.setItem("username", this.returndata.data[0].name);
    this.router.navigate(['/orderfetch']);
    
    },
    errorResponse => {
      this.successmsg = false;
      this.errormsg = true;
    }
    );
  
  }
}
