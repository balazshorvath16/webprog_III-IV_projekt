# Webprogramozás III. / IV. beadandó feladat.

---

# Projekt Dokumentáció: Laravel és Angular Alapú Webalkalmazás

---

## 1. Projekt Célja

A projekt egy társasjáték webshop készítése, amely lehetőséget biztosít a felhasználók számára játékok listázására, megtekintésére, valamint az adminisztrátorok által történő árudarabok hozzáadására, módosítására és törlésére. A cél egy modern, Angular frontend és Laravel backend integrációján alapuló alkalmazás létrehozása.

---

## 2. Használt Technológiák

- **Laravel**: Backend keretrendszer az API-k és adatbázis-kezeléshez.
- **Angular**: Frontend keretrendszer az interaktív felhasználói felület készítéséhez.
- **MySQL**: Relációs adatbázis-kezelő rendszer.
- **Postman**: API-k teszteléséhez használt eszköz.
- **XAMPP**: Lokális szerverkörnyezet (Apache és MySQL).

---

## 3. Laravel Keretrendszer

- **Cél**: Egy RESTful API létrehozása, amely a társasjátékok CRUD (Create, Read, Update, Delete) műveleteit kezeli.
- **Főbb Jellemzők**:
  - **MVC Struktúra**: Modell-View-Controller architektúra.
  - **Authentikáció**: Laravel Sanctum használata a token alapú hitelesítéshez.
  - **Migrációk**: Adatbázis táblák létrehozása és karbantartása.
  - **Adatbázis Kapcsolatok**: Felhasználó-szerepkör és játékok kezelése.

---

## 4. Angular Keretrendszer

- **Cél**: Felhasználóbarát interfész biztosítása az API funkcióinak kihasználására.
- **Főbb Jellemzők**:
  - **Komponens-alapú Fejlesztés**: Pl. game-list és game-detail komponensek.
  - **Service-ek**: HTTP kérések kezelése a backend felé.
  - **Routing**: Navigáció a különböző oldalak között.
  - **Token Kezelés**: HTTP Interceptor által automatizált hitelesítési fejléc hozzáadása.

---

## 5. Laravel és Angular Kapcsolata

- **Adatok Cseréje**: 
  - Az Angular az adatokat a Laravel REST API-ján keresztül szerzi be.
  - Az autentikációhoz használt tokeneket a helyi tárban („localStorage”) tároljuk.

- **API Hívás**:
  1. Felhasználó bejelentkezik (átadja az email-címet és a jelszót).
  2. Backend visszaad egy Bearer tokent.
  3. Az Angular minden játék lekérdezésnél (és más API hívásoknál) csatolja ezt a tokent.

---

## 6. Főbb Funkciók

### 6.1. Felhasználó Kezelés
- **Regisztráció**: Felhasználó adatok elmentése.
- **Bejelentkezés**: Token alapú hitelesítés biztosítása.
- **Kijelentkezés**: Token érvénytelenítése.

### 6.2. Admin Funkciók
- Játékok hozzáadása, módosítása és törlése.

### 6.3. Felhasználó Funkciók
- Játékok listájának megtekintése.
- Részletes információk megtekintése egy játékról.

---

## 7. Tesztelés Postman-ben

A backend API-k tesztelését Postman-ben végeztük, a következő módon:

### 7.1. Regisztráció Tesztelése
- **URL**: `POST http://127.0.0.1:8000/api/register`
- **Body** (JSON):
  ```json
  {
    "name": "Teszt Felhasználó",
    "email": "teszt@example.com",
    "password": "password123",
    "password_confirmation": "password123"
  }
  ```

### 7.2. Bejelentkezés Tesztelése
- **URL**: `POST http://127.0.0.1:8000/api/login`
- **Body** (JSON):
  ```json
  {
    "email": "teszt@example.com",
    "password": "password123"
  }
  ```
- **Válasz**: 
  ```json
  {
    "access_token": "xyz123",
    "token_type": "Bearer"
  }
  ```

### 7.3. Játék Lista Lekérdezése
- **URL**: `GET http://127.0.0.1:8000/api/games`
- **Headers**:
  ```
  Authorization: Bearer <access_token>
  ```
- **Válasz**:
  ```json
  [
    {
      "id": 1,
      "title": "Rettegés Arkhamban",
      "price": 5000,
      "stock": 10,
      "description": "1926-ot írunk, a viharos huszas évek derekán járunk. Csinos hölgyek táncolnak virradatig a füsttel teli, alkoholtól fűtött hangulatú helyiségekben. Mindeközben különös lények törnek be a világok közötti kapun, hogy átvegyék az uralmat felettünk. Te meg tudod állítani őket?"
    }
  ]
  ```

---

## 8. Hibakezelés és Fejlesztési Tippek

- **Backend Hibák**: Az adatbázis és az API route-ok helyes beállítása elengedhetetlen.
- **Frontend Hibák**: Az Angular HTTP-kéréseknél mindig ellenőrizni kell, hogy a token helyesen van-e csatolva.
- **Token Kezelés**: Az access tokenek lejáratának kezelése (pl. frissítés vagy hibaüzenetek kezelése).

---

## 9. Fejlesztési Tervek

- **Kosár Funkcionalitás**: Lehetőség a játékok kosárba helyezésére.
- **Rendelések Kezelése**: Vásárlás admin és user oldalon.
- **Képfeltöltés**: Játékokhoz tartozó képek kezelése.

---

Ezzel a dokumentációval áttekinthetővé válik a projekt célja, technológiai megvalósítása, valamint a további fejlesztések lehetőségei.
