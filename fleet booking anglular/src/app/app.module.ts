import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { MaterialAppModule } from './ngmaterial.module';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';

/*components - Page level*/
import { CmHeaderComponent } from './components/cm-header/cm-header.component';
import { CmFooterComponent } from './components/cm-footer/cm-footer.component';

import { PgDashboardComponent } from './components/pg-dashboard/pg-dashboard.component';

import { PgFormRegisterComponent } from './components/pg-form-register/pg-form-register.component'; 
import { PgFormRegisterSuccessComponent } from './components/pg-form-register-success/pg-form-register-success.component';

import { ZPgUIThemeComponent } from './components/z-pg-uitheme/z-pg-uitheme.component';

//-------------//
import {MatTableModule} from '@angular/material/table'; //mat table module
import { HttpClientModule } from '@angular/common/http';
import { MatPaginatorModule } from '@angular/material/paginator';
import { ReactiveFormsModule, FormsModule } from '@angular/forms';
import { LoginComponent } from './components/login/login.component';






@NgModule({
  declarations: [
    AppComponent,
      CmHeaderComponent,
      CmFooterComponent,
    PgDashboardComponent,
      PgFormRegisterComponent, 
      PgFormRegisterSuccessComponent,
    ZPgUIThemeComponent,
    LoginComponent, 
  ],
  imports: [
    BrowserModule,
    BrowserAnimationsModule,
    MaterialAppModule,
    AppRoutingModule,
    //--------//
    MatTableModule,
    HttpClientModule,
    MatPaginatorModule,
    ReactiveFormsModule,
    FormsModule,
  ],
  providers: [    
  ],
  bootstrap: 
    [AppComponent
  ],
  entryComponents: [ 
  ]

})
export class AppModule { }
