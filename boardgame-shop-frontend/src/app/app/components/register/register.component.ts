import { Component } from '@angular/core';
import { AuthService } from '../../../services/auth.service';
import { FormsModule } from '@angular/forms';

@Component({
  selector: 'app-register',
  standalone: true,
  imports: [FormsModule],
  templateUrl: './register.component.html',
  styleUrls: ['./register.component.css']
})
export class RegisterComponent {
  user = {
    name: '',
    email: '',
    password: '',
    password_confirmation: ''
  };

  constructor(private authService: AuthService) { }

  register() {
    this.authService.register(this.user).subscribe(
      (response: any) => {
        console.log('Registration successful', response);
      },
      (error: any) => {
        console.error('Registration error', error);
      }
    );
  }
}
