import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { CmHeaderComponent } from './cm-header.component';

describe('CmHeaderComponent', () => {
  let component: CmHeaderComponent;
  let fixture: ComponentFixture<CmHeaderComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ CmHeaderComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(CmHeaderComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
