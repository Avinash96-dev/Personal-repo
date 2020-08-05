import { Component, Input,Inject, OnInit, EventEmitter, Output, ViewChild } from '@angular/core'; 
import { MatDialog, MatDialogRef, MAT_DIALOG_DATA } from '@angular/material/dialog';
import { Router } from '@angular/router';
//-------------//
import { MatPaginator } from '@angular/material/paginator';
import { MatSort } from '@angular/material/sort';
import {MatTableDataSource} from '@angular/material/table';
import {SelectionModel} from '@angular/cdk/collections';
import { MatDatepicker } from "@angular/material/datepicker";
import { FleetBookingService } from 'src/app/services/fleet-booking.service';
import { FormGroup, FormControl, Validators } from '@angular/forms';
import { DatePipe } from '@angular/common';
import {MatDatepickerInputEvent} from '@angular/material/datepicker';

import {ErrorStateMatcher} from '@angular/material/core';





 

@Component({
  selector: 'app-pg-form-register',
  templateUrl: './pg-form-register.component.html', 
  styleUrls: ['./pg-form-register.component.scss'],
  providers: [ DatePipe ]
})


export class PgFormRegisterComponent implements OnInit {
  bookingSuccessMessage = false;
  fleetBooking = new FormGroup({
    firstName: new FormControl('',[Validators.compose([Validators.required,Validators.pattern("^[a-z A-Z.]+$")])]),
    location: new FormControl('',[Validators.compose([Validators.required,Validators.pattern("^[a-z A-Z.]+$")])]),
    contactNumber: new FormControl('', [Validators.required, Validators.maxLength(10), Validators.pattern("^[0-9]{10}$")]),
    alternateContactNumber: new FormControl('',[Validators.maxLength(10), Validators.pattern("^[0-9]{10}$")]),
    email: new FormControl('',[Validators.compose([Validators.email])]),
    fromDate: new FormControl('',Validators.required),
    toDate: new FormControl('',Validators.required),

    // bookQuantity: new FormControl('',Validators.required),

  });
  formvalue: any;
  _endDate: Date;
  enableButton : boolean;

  trial(){
    console.log(this.fleetBooking.value);
  }


  // constructor(public router: Router, public dialog: MatDialog,) { }

  // ngOnInit(): void {
  // }
  
  // Routing - STARTS
  //dashboard
  onViewPgDashboard() {   
    this.router.navigate(['index']);
  }
  

  distinctFleetCategory: any = [];
  distinctFleetBrand: any = [];
  distinctFleetModel: any =[];

  copyDataSource;
  filteredData : any =[];
  filteredBrand :any = [];
  filteredModel: any= [];

  @ViewChild(MatPaginator) paginator: MatPaginator;
  @ViewChild(MatSort, {static: true}) sort: MatSort;
  @ViewChild('picker') picker :MatDatepicker<Date>;

  dataSource: MatTableDataSource<any> = new MatTableDataSource([]);
  selection = new SelectionModel<any>(true, []);
 
  /** Columns displayed in the table. Columns IDs can be added, removed, or reordered. */
  displayedColumns = ['select','fleet_category','fleet_brand','model','fleet_units','Available_fleets','book_required','Business Name','Contact Number'];
  
  constructor(public router: Router, public dialog: MatDialog,private myservice:FleetBookingService,  private datePipe: DatePipe,){ }
  minDate = new Date();
  applyFilter(event: Event) {
    const filterValue = (event.target as HTMLInputElement).value;
    this.dataSource.filter = filterValue.trim().toLowerCase();
  }

  


  ngOnInit() {
    this.myservice.getData().subscribe(res =>{
    this.dataSource = new MatTableDataSource(res['result']);
    this.copyDataSource = res['result'];
    this.dataSource.sort = this.sort;
    this.dataSource.paginator = this.paginator; 
    this.getFleetCategory();  
    // this.endDate();
     });
  }

  sendValueForEndDate(event :MatDatepickerInputEvent<Date>){
    this._endDate =  event.value
  }

  isAllSelected() {
    const numSelected = this.selection.selected.length;
    const numRows = this.dataSource.data.length;
    return numSelected === numRows;
  }

  /** Selects all rows if they are not all selected; otherwise clear selection. */
  masterToggle() {
    this.isAllSelected() ?
        this.selection.clear() :
        this.dataSource.data.forEach(row => this.selection.select(row));
  }

  /** The label for the checkbox on the passed row */
  checkboxLabel(row?: any): string {
    if (!row) {
      return `${this.isAllSelected() ? 'select' : 'deselect'} all`;
    }
    return `${this.selection.isSelected(row) ? 'deselect' : 'select'} row ${row.position + 1}`;
  }

  //----------Getting Distinct Fleet Category Values return in DataSource-------------
  getFleetCategory() {
  
    var fleetCategory = this.dataSource['_data']['_value'];
    console.log(fleetCategory);

    this.distinctFleetCategory = ['All',...new Set(fleetCategory.map(x=>x.fleet_category))];
  }  
   
  //-------displaying relevant data to selected fleet category---------
  onChangeCategory(event, category){
    let allData = [...this.copyDataSource];

    if(category === "All") {
      this.dataSource = new MatTableDataSource(allData);
      this.dataSource.sort = this.sort;
      this.dataSource.paginator = this.paginator;
    } else {
      this.filteredData = allData.filter(data => {
        return data.fleet_category === category;
      });
      this.dataSource = new MatTableDataSource(this.filteredData);
      this.dataSource.sort = this.sort;
      this.dataSource.paginator = this.paginator;
    }
    this.getFleetBrand();
    this.getFleetModelFromFleetCategory();
  }


// ------Getting Distinct Fleet Brand from the selected fleet category----------
  getFleetBrand() {
    this.distinctFleetBrand = ['All',...new Set(this.filteredData.map(x=>x.brand))];
  }  

//-----displaying relevant data to the selected Fleet Brand--------------
  onChangeBrand(event, brand) {
    let filtered_category = [...this.filteredData];

    if(brand === "All") {
      this.filteredBrand = filtered_category;
      this.dataSource = new MatTableDataSource(filtered_category);
      this.dataSource.sort = this.sort;
      this.dataSource.paginator = this.paginator;
    } else {
      this.filteredBrand = filtered_category.filter(data => {
        return data.brand === brand;
      });
      this.dataSource = new MatTableDataSource(this.filteredBrand);
      this.dataSource.sort = this.sort;
      this.dataSource.paginator = this.paginator;
    }  

    this.getFleetModel();

  } 

  //-------getting distinct  fleet model from the selected fleet category---------------
  getFleetModelFromFleetCategory(){
    this.distinctFleetModel = ['All',...new Set(this.filteredData.map(x=>x.model))];
  }
  
 //-----Getting distinct fleet model from the selected fleet brand--------- 
  getFleetModel(){
    this.distinctFleetModel =  ['All',...new Set(this.filteredBrand.map(x=>x.model))];
  }

//-------Displaying relevant data  to the selected Fleet Brand--------
  onChangeModel(event , model) {
    let filtered_model = [...this.filteredBrand];

    if(model === "All") {
      this.dataSource = new MatTableDataSource(filtered_model);
      this.dataSource.sort = this.sort;
      this.dataSource.paginator = this.paginator;
    } else {
      this.filteredModel = filtered_model.filter(data => {
      return data.model === model;
    });
    this.dataSource = new MatTableDataSource(this.filteredModel);
    this.dataSource.sort = this.sort;
    this.dataSource.paginator = this.paginator;
    }
    
  }

  onEnteringRequiredFleetQuantity(index, rowData, enteredValue) {
    let row = this.dataSource.data[index];

    if(enteredValue > row.AvailableFleets){
      row['enteredValue'] = row.AvailableFleets; 
    } else if(enteredValue < 1) {
      row['enteredValue'] = 1;
    } else {
      row['enteredValue'] = enteredValue;
    }

    console.log(row,enteredValue);
    row['bookings_required'] = row['enteredValue'];
    const newItems = this.dataSource.data.map((item, i) => i === index ? row : item);
    this.dataSource = new MatTableDataSource(newItems);
    this.dataSource.sort = this.sort;
    this.dataSource.paginator = this.paginator; 
     this.enableButton = enteredValue != "";
  }


  onSubmit()
  {
    this.formvalue=this.fleetBooking.value;
    // this.formvalue.fromDate   = this.datePipe.transform(this.formvalue.fromDate, 'dd-MM-yyyy');
    // this.formvalue.toDate   = this.datePipe.transform(this.formvalue.toDate, 'dd-MM-yyyy');
console.log(this.selection.selected);
        let trial = this.selection.selected.filter((item) =>{
         return item.bookings_required ? item : false});
         console.log(trial);
         var sendTogether = {datum : {general : this.formvalue , fleet : trial}}
    console.log(sendTogether.datum.fleet);


    this.myservice.sendData(sendTogether).subscribe(data=>{
      var bookingId =data;//['booked']['id'];
      console.log(bookingId);
      this.myservice.dataFromService = bookingId;
      this.router.navigate(['pgRegisterBookingSuccess']);
    });
  }

 
}

