import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { PgFormRegisterComponent } from './pg-form-register.component';

describe('PgFormRegisterComponent', () => {
  let component: PgFormRegisterComponent;
  let fixture: ComponentFixture<PgFormRegisterComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ PgFormRegisterComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(PgFormRegisterComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
