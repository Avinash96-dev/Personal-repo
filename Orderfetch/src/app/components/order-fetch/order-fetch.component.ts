import { Component, OnInit, ViewChild } from '@angular/core';
import { FormGroup, FormControl, Validators } from '@angular/forms';
import { Router } from '@angular/router';
import { FormserviceService } from 'src/app/service/formservice.service';

import { MatTableDataSource } from '@angular/material/table';
import { DatePipe } from '@angular/common';
import { MatPaginator } from '@angular/material/paginator';
import { MatSort } from '@angular/material/sort';
import { HttpClient } from '@angular/common/http';

@Component({
  selector: 'app-order-fetch',
  templateUrl: './order-fetch.component.html',
  styleUrls: ['./order-fetch.component.scss']
})


export class OrderFetchComponent implements OnInit {
 
  maxDate = new Date();
  orderfetch = new FormGroup({
    dateFetch: new FormControl(new Date()),
    
  });
  
  returndata: any={};
  result: any={};
  orderTable = false;
  userTable = false;
  noDataalert=false;
  @ViewChild(MatPaginator) paginator: MatPaginator;
  @ViewChild(MatSort, {static: true}) sort: MatSort;
  dataSource: MatTableDataSource<any> = new MatTableDataSource([]);
  // selection = new SelectionModel<any>(true, []);
 
  /** Columns displayed in the table. Columns IDs can be added, removed, or reordered. */
  displayedOrderColumns = ['position','order_ID','Customer_Name','Customer_Mobile_Number','Delivery_State'];
  displayedUserColumns = ['position','FullName','Registered_Mobile_Number','State','Registered_Date'];

  orders: any = [];
  users:any = [];
  convertedDate:string;
  formBuilder: any;
  orderId:any;
  userId:any;
  initialData:any;
  noRecords: any;
  

  constructor(public router: Router,private dataservice:FormserviceService,private datePipe: DatePipe,private http:HttpClient) { }

  ngOnInit(): void {
 

    this.dataservice.getInitialData().subscribe(data=>
      {
          this.initialData=data;
          // console.log(this.initialData);
          if(this.initialData.length === 0){
            this.convertedDate = this.datePipe.transform(this.maxDate,'dd-MM-yyyy');   
            this.noRecords = "No Records found for "+this.convertedDate;
            this.noDataalert=true;
           } else {
             this.orderTable = true;
             this.dataSource = new MatTableDataSource(this.returndata);
             this.dataSource.sort = this.sort;
             this.dataSource.paginator = this.paginator;
           }
          
        });
    }

  onOrderFetch(){
    this.noDataalert=false;
    this.orderTable = false;
    this.userTable = false;
    this.result = this.orderfetch.value
    this.convertedDate = this.datePipe.transform(this.result.dateFetch,'dd-MM-yyyy');
    this.orderId = 1;
    this.orders.splice(0, this.orders.length); 
    this.orders.push({Date:this.convertedDate, clickId : this.orderId});
    this.dataservice.sendOrderDate(this.orders).subscribe(data=>{
    this.returndata=data;
    if(this.returndata.length === 0){   
     this.noRecords = "No Records found for "+this.convertedDate;
     this.noDataalert=true;
    } else {
      this.orderTable = true;
      this.dataSource = new MatTableDataSource(this.returndata);
      this.dataSource.sort = this.sort;
      this.dataSource.paginator = this.paginator;
    }
  });
 }

 onUserFetch(){
  this.noDataalert=false;
  this.orderTable = false;
  this.userTable = false;
  this.result = this.orderfetch.value
  this.convertedDate = this.datePipe.transform(this.result.dateFetch,'dd-MM-yyyy');
  this.userId = 2;
  this.users.splice(0, this.users.length); 
  this.users.push({Date:this.convertedDate, clickId : this.userId});
  this.dataservice.sendUserDate(this.users).subscribe(data=>{
  this.returndata=data;
  if(this.returndata.length === 0){   
   this.noRecords = "No Records found for "+this.convertedDate;
   this.noDataalert=true;
  } else {
    this.userTable = true;
    this.dataSource = new MatTableDataSource(this.returndata);
    this.dataSource.sort = this.sort;
    this.dataSource.paginator = this.paginator;
  }
});
}


  logout()
  {
    sessionStorage.clear();
    this.router.navigate(['/']);
  }
}
