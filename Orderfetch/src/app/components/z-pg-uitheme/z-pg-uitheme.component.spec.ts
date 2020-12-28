import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ZPgUIThemeComponent } from './z-pg-uitheme.component';

describe('ZPgUIThemeComponent', () => {
  let component: ZPgUIThemeComponent;
  let fixture: ComponentFixture<ZPgUIThemeComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ZPgUIThemeComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ZPgUIThemeComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
