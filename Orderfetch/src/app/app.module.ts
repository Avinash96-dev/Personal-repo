import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { MaterialAppModule } from './ngmaterial.module';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';

/*components - Page level*/
import { CmHeaderComponent } from './components/cm-header/cm-header.component';
import { CmFooterComponent } from './components/cm-footer/cm-footer.component';
import { ZPgUIThemeComponent } from './components/z-pg-uitheme/z-pg-uitheme.component';
import { ReactiveFormsModule } from '@angular/forms';
import { HttpClientModule } from '@angular/common/http';
import { NgxSpinnerModule } from "ngx-spinner";
import { LoginComponent } from './components/login/login.component';
import { FormserviceService } from './service/formservice.service';
import { OrderFetchComponent } from './components/order-fetch/order-fetch.component';

//--------------OrderFetch------------------//
import {MatTableModule} from '@angular/material/table'; //mat table module
import { MatPaginatorModule } from '@angular/material/paginator';
import { DatePipe } from '@angular/common';
import { AuthGuard } from './auth.guard';




@NgModule({
  declarations: [
    AppComponent,
      CmHeaderComponent,
      CmFooterComponent,
    ZPgUIThemeComponent,
    LoginComponent,
    OrderFetchComponent,
  ],
  imports: [
    BrowserModule,
    BrowserAnimationsModule,
    MaterialAppModule,
    AppRoutingModule,
    ReactiveFormsModule,
    HttpClientModule,
    NgxSpinnerModule,
    //---OF---//
    MatTableModule,
    MatPaginatorModule,
  ],
  providers: [  FormserviceService,AuthGuard,
    DatePipe, //--OF---//  
  ],
  bootstrap: 
    [AppComponent
  ],
  entryComponents: [ 
   
  ]

})
export class AppModule { }
