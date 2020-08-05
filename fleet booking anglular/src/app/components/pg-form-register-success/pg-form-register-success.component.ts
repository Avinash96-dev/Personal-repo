import { Component, Inject, OnInit, EventEmitter, Output, ViewChild } from '@angular/core'; 
import { MatDialog, MatDialogRef, MAT_DIALOG_DATA } from '@angular/material/dialog';
import { Router } from '@angular/router';
//----------//
import { FleetBookingService } from 'src/app/services/fleet-booking.service';


@Component({
  selector: 'app-pg-form-register-success',
  templateUrl: './pg-form-register-success.component.html',
  styleUrls: ['./pg-form-register-success.component.scss']
})
export class PgFormRegisterSuccessComponent implements OnInit {
  printCustomerDetails: any = [];
  data: any = [];
  distinctFleetcategory: any = [];
  datacopy: any;

  constructor(public router: Router, public dialog: MatDialog,private myservice:FleetBookingService) {

   }

  ngOnInit(): void {
    this.data = this.myservice.dataFromService['booked'];
    console.log(this.data);
    this.datacopy = this.myservice.dataFromService['booked'];
    this.getBookedFleetDetails();

  }
  // Routing - STARTS
  //dashboard
  onViewPgDashboard() {   
    this.router.navigate(['index']);
  }

  getBookedFleetDetails(){
    
    var groups = [];
    for (var i = 0; i <this.data.length; i++) {
      var groupName = this.data[i].fleet_category;
      if (!groups[groupName]) {
        groups[groupName] = [];
      }
      groups[groupName].push(this.data[i]);
    }

    this.datacopy = [];
    for (groupName in groups) {
      this.datacopy.push({fleet_category: groupName, details: groups[groupName]});
    }

    this.distinctFleetcategory = this.datacopy;
    console.log(this.distinctFleetcategory);
  
 }

}
