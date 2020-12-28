import { Injectable } from '@angular/core';
import { CanActivate, Router } from '@angular/router';
import { FormserviceService } from './service/formservice.service';


@Injectable({
  providedIn: 'root'
})
export class AuthGuard implements CanActivate {
  constructor( public router: Router,private dataservice:FormserviceService){}

  canActivate(): boolean{
    if(this.dataservice.authChecking()) {
      return true;
    } else {
      this.router.navigate(['/'])
      return false;
    }
  }
  
}
