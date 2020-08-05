import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-cm-header',
  templateUrl: './cm-header.component.html',
  styleUrls: ['./cm-header.component.scss']
})
export class CmHeaderComponent implements OnInit {
  public nowDatetime: Date = new Date();
  constructor() { 
    setInterval(() => {
      this.nowDatetime = new Date();
    }, 60);
  }

  ngOnInit(): void {
  }

}
