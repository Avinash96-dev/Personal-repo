import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { OrderFetchComponent } from './order-fetch.component';

describe('OrderFetchComponent', () => {
  let component: OrderFetchComponent;
  let fixture: ComponentFixture<OrderFetchComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ OrderFetchComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(OrderFetchComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
