import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { CmFooterComponent } from './cm-footer.component';

describe('CmFooterComponent', () => {
  let component: CmFooterComponent;
  let fixture: ComponentFixture<CmFooterComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ CmFooterComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(CmFooterComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
