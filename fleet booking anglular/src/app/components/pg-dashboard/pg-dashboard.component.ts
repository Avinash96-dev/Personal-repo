import { Component, Inject, OnInit, EventEmitter, Output, ViewChild, HostListener } from '@angular/core';
import { Router } from '@angular/router';

@Component({
  selector: 'app-pg-dashboard',
  templateUrl: './pg-dashboard.component.html',
  styleUrls: ['./pg-dashboard.component.scss']
})
export class PgDashboardComponent implements OnInit {

  constructor(public router: Router,) { }
  successmsg=false;
  ngOnInit(): void {
  }

  // Routing - STARTS
  //view form booking details 
  onViewPgRegisterBooking() {  
    this.router.navigate(['pgRegisterBooking']);
  } 

}
