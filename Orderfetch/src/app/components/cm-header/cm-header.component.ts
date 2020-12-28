import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';

@Component({
  selector: 'app-cm-header',
  templateUrl: './cm-header.component.html',
  styleUrls: ['./cm-header.component.scss']
})
export class CmHeaderComponent implements OnInit {

  public nowDatetime: Date = new Date();
  constructor(public router: Router) {
    setInterval(() => {
      this.nowDatetime = new Date();
    }, 60);
   }

  ngOnInit(): void {
  }



 
}
