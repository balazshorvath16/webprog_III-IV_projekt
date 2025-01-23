import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
// Importáld a komponenseket, ha létrehoztad őket:
// import { RegisterComponent } from './components/register/register.component';
// import { LoginComponent } from './components/login/login.component';
// import { GameListComponent } from './components/game-list/game-list.component';

const routes: Routes = [
  // Add hozzá a route-okat itt:
  // { path: 'register', component: RegisterComponent },
  // { path: 'login', component: LoginComponent },
  // { path: 'games', component: GameListComponent },
  { path: '', redirectTo: '/login', pathMatch: 'full' }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
