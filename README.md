# ✨ Aura Health - Backend

Backend-ul pentru platforma modernă de telemedicină "Aura Health". Construit pe **Laravel 12**, acest API RESTful oferă o fundație sigură și scalabilă pentru gestionarea utilizatorilor, consultațiilor și a altor funcționalități cheie. Întregul mediu de dezvoltare este containerizat cu **Docker** pentru o portabilitate și o configurare rapidă.

---

## 🚀 Funcționalități Cheie

* **Autentificare Securizată:** Sistem de înregistrare și login pentru SPA (Single Page Application) folosind **Laravel Sanctum**.
* **API RESTful:** O arhitectură curată, bazată pe resurse, pentru a expune datele către orice tip de client (web, mobil).
* **Arhitectură pe Straturi (Services):** Logica de business este decuplată de controllere pentru un cod mai curat, testabil și ușor de întreținut.
* **Mediu de Dezvoltare Containerizat:** Folosește **Docker** și **Docker Compose** pentru a rula aplicația, serverul web (Nginx) și baza de date (PostgreSQL) într-un mediu izolat și consistent.
* **Gestionarea Bazei de Date prin Migrații:** Structura bazei de date este versionată și gestionată direct prin migrațiile Laravel.

---

## 🛠️ Tech Stack

* **Framework:** [Laravel](https://laravel.com/) 12
* **Limbaj:** [PHP](https://www.php.net/) 8.2+
* **Bază de Date:** [PostgreSQL](https://www.postgresql.org/) 15
* **Server Web:** [Nginx](https://nginx.org/)
* **Containerizare:** [Docker](https://www.docker.com/) & [Docker Compose](https://docs.docker.com/compose/)
* **Autentificare:** [Laravel Sanctum](https://laravel.com/docs/sanctum)

---

## ⚙️ Cum să pornești proiectul

Urmează acești pași pentru a obține o copie locală a proiectului și a o porni.

### Prerechizite
* [Docker Desktop](https://www.docker.com/products/docker-desktop/) instalat și pornit.
* [Composer](https://getcomposer.org/) instalat local (necesar pentru prima instalare a dependențelor).
* [Git](https://git-scm.com/)

### Instalare

1.  **Clonează repository-ul:**
    ```bash
    git clone https://github.com/AdrianRazvanRadulescu/aura-health-backend.git
    ```

2.  **Navighează în directorul proiectului:**
    ```bash
    cd aura-health-backend
    ```

3.  **Creează fișierul de mediu (`.env`):**
    Copiază fișierul exemplu. Acesta conține deja setările corecte pentru mediul Docker.
    ```bash
    cp .env.example .env
    ```

4.  **Construiește și pornește containerele Docker:**
    Această comandă va construi imaginea PHP, va porni containerele pentru aplicație, Nginx și PostgreSQL în fundal.
    ```bash
    docker-compose up -d --build
    ```

5.  **Instalează dependențele PHP cu Composer:**
    Această comandă se rulează *în interiorul* containerului.
    ```bash
    docker-compose exec app composer install
    ```

6.  **Generează cheia aplicației:**
    ```bash
    docker-compose exec app php artisan key:generate
    ```

7.  **Rulează migrațiile bazei de date:**
    Această comandă va crea toate tabelele necesare în baza de date PostgreSQL.
    ```bash
    docker-compose exec app php artisan migrate
    ```

Aplicația ar trebui să fie acum disponibilă în browser la adresa `http://localhost:8000`.

---

## 🔌 Endpoints API

Următoarele endpoint-uri sunt disponibile:

| Metodă | URI                    | Nume Acțiune         | Middleware        |
| :----- | :--------------------- | :------------------- | :---------------- |
| POST   | `/api/register`        | `auth.register`      | `guest`           |
| POST   | `/api/login`           | `auth.login`         | `guest`           |
| POST   | `/api/logout`          | `auth.logout`        | `auth:sanctum`    |
| GET    | `/api/user`            | `auth.user`          | `auth:sanctum`    |
| GET    | `/sanctum/csrf-cookie` | `sanctum.csrf-cookie`| `web`             |


---

## 📄 Licență

Acest proiect este distribuit sub licența MIT. Vezi `LICENSE` pentru mai multe informații.