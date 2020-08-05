import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { PgFormRegisterSuccessComponent } from './pg-form-register-success.component';

describe('PgFormRegisterSuccessComponent', () => {
  let component: PgFormRegisterSuccessComponent;
  let fixture: ComponentFixture<PgFormRegisterSuccessComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ PgFormRegisterSuccessComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(PgFormRegisterSuccessComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
