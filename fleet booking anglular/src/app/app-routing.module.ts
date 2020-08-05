import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

/*components - Page level*/
import { CmHeaderComponent } from './components/cm-header/cm-header.component';
import { CmFooterComponent } from './components/cm-footer/cm-footer.component';

import { PgDashboardComponent } from './components/pg-dashboard/pg-dashboard.component'; 
import { PgFormRegisterComponent } from './components/pg-form-register/pg-form-register.component'; 
import { PgFormRegisterSuccessComponent } from './components/pg-form-register-success/pg-form-register-success.component';

import { ZPgUIThemeComponent } from './components/z-pg-uitheme/z-pg-uitheme.component';
import { LoginComponent } from './components/login/login.component';

const routes: Routes = [
  {path: 'login', component: LoginComponent},
  {path: '', component: PgDashboardComponent},
  {path: 'index', component: PgDashboardComponent},
  {path: 'pgRegisterBooking', component: PgFormRegisterComponent}, 
  {path: 'pgRegisterBookingSuccess', component: PgFormRegisterSuccessComponent}, 
  {path: 'pgUItheme', component: ZPgUIThemeComponent},
];

@NgModule({
  imports: [RouterModule.forRoot(routes , { scrollPositionRestoration: 'enabled' })],
  exports: [RouterModule]
})
export class AppRoutingModule { }
