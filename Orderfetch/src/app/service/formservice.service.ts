import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders,  } from '@angular/common/http';
import { Router } from '@angular/router';


@Injectable({
  providedIn: 'root'
})
export class FormserviceService {
  getUploadFileName;
  getUpdatedUploadFileName;
  
  url = 'http://emoindia.com/index.php/'
  orderFetchUrl='http://emoindia.com/support/order_retrieval.php'
  
  constructor(private http:HttpClient,public router: Router) { }
  ngOnInit(): void {
    console.log(this.getUploadFileName);
  }

Authdata(data)
{
    let url1 =  'useraccess';
     return this.http.post(this.url+url1 ,data);  
}
sendOrderDate(data){
    return this.http.post(this.orderFetchUrl,data);
  }

sendUserDate(data){
    return this.http.post(this.orderFetchUrl,data);
  }

getInitialData()
{
  return this.http.get(this.orderFetchUrl);
}



authChecking() {
    return !!sessionStorage.getItem("username");
   }

}
