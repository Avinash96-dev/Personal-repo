import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { PgDashboardComponent } from './pg-dashboard.component';

describe('PgDashboardComponent', () => {
  let component: PgDashboardComponent;
  let fixture: ComponentFixture<PgDashboardComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ PgDashboardComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(PgDashboardComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
