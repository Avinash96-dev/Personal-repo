import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

/*components - Page level*/
import { CmHeaderComponent } from './components/cm-header/cm-header.component';
import { CmFooterComponent } from './components/cm-footer/cm-footer.component';

import { ZPgUIThemeComponent } from './components/z-pg-uitheme/z-pg-uitheme.component';
import { LoginComponent } from './components/login/login.component';
import { OrderFetchComponent } from './components/order-fetch/order-fetch.component';
import { AuthGuard } from './auth.guard';

const routes: Routes = [
  {path: '', component: LoginComponent},
  {path: 'orderfetch',component: OrderFetchComponent,canActivate:[AuthGuard]},
  {path: 'pgUItheme', component: ZPgUIThemeComponent},
];

@NgModule({
  imports: [RouterModule.forRoot(routes , { scrollPositionRestoration: 'enabled' })],
  exports: [RouterModule]
})
export class AppRoutingModule { }
