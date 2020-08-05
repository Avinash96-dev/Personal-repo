import { Injectable } from '@angular/core';
//---------//
import { HttpClient} from '@angular/common/http';


@Injectable({
  providedIn: 'root'
})
export class FleetBookingService {
  dataFromService;

  _backendUrl = 'http://emoindia:3000/';

  constructor(private _http: HttpClient) { }

  Authdata(data){
    return this._http.get(this._backendUrl);


  }

  getData(){
    let url1 = 'readassets';
    return this._http.get(this._backendUrl+url1);
  }

  sendData(data){
    let url2 = 'book';
   return this._http.post(this._backendUrl+url2,data);
  }

  // getBookingData(id){
  //   let url3 = 'getbookings/';
  //   return this._http.get(this._backendUrl+url3+id);
  // }

}
