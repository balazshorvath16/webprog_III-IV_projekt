import { Component } from '@angular/core';
import { AuthService } from '../../../services/auth.service';
import { Router } from '@angular/router';
import { FormsModule } from '@angular/forms';
import { CommonModule } from '@angular/common';

@Component({
  selector: 'app-login',
  standalone: true,
  imports: [CommonModule, FormsModule],
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent {

  credentials = {
    email: '',
    password: ''
  };

  loading = false;
  errorMessage = '';

  constructor(
    private authService: AuthService,
    private router: Router
  ) {}
  login() {
    this.loading = true;
    this.errorMessage = '';

    this.authService.login(this.credentials).subscribe({
      next: (response) => {
        console.log('Login successful', response);

        if (response?.access_token) {
          localStorage.setItem('access_token', response.access_token);
        }

        this.loading = false;
        this.router.navigate(['/games']);
      },
      error: (err) => {
        console.error('Login error', err);
        this.loading = false;
        this.errorMessage = 'Hibás email vagy jelszó.';
      }
    });
  }
}
