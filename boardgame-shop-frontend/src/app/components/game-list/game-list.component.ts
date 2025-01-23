import { Component, OnInit } from '@angular/core';
import { GameService } from '../../services/game.service';

@Component({
  selector: 'app-game-list',
  standalone: true,
  templateUrl: './game-list.component.html',
  styleUrls: ['./game-list.component.css'],
  imports: []
})
export class GameListComponent implements OnInit {
  games: any[] = [];
  errorMessage = '';
  loading = false;

  constructor(private gameService: GameService) {}

  ngOnInit(): void {
    this.loadGames();
  }

  loadGames() {
    this.loading = true;
    const token = localStorage.getItem('access_token');
    if (!token) {
      this.errorMessage = 'Nincs token, előbb jelentkezz be!';
      this.loading = false;
      return;
    }

    this.gameService.getGames(token).subscribe({
      next: (response) => {
        this.games = response;
        this.loading = false;
      },
      error: (err) => {
        console.error('Hiba a játékok lekérésekor:', err);
        this.errorMessage = 'Nem sikerült lekérdezni a játékokat.';
        this.loading = false;
      }
    });
  }
}
