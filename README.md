<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Soccer Bets Tracker

A Laravel and Vue application for managing soccer bets and tracking user profile stats. This project includes features for user authentication, bet management, and detailed statistics.

![image](https://github.com/user-attachments/assets/8fb79417-b376-4be5-8084-e951193e09ca)


---

## Features
- **User Authentication:** Built-in authentication using Laravel Breeze.
- **Bet Management:** Add, edit, delete, and view soccer bets.
- **Profile Stats:** Track win/loss ratio, total winnings, and other stats.

---

## Getting Started

### Prerequisites
Ensure you have the following installed:
- PHP (>=8.1)
- Composer
- Node.js and npm
- MySQL or another supported database

---

### Installation

1. **Clone the Repository**
   ```bash
   git clone <repository-url>
   cd soccer-bets-tracker

2. **Install Backend Dependencies**
   ```bash
   composer install

3. **Install Frontend Dependencies**
   ```bash
   npm install

4.  **Environment setup**
    - Update .env with your database and other configuration settings.
    ```bash
    cp .env.example .env
    php artisan key:generate

5. **Run migrations**
    ```bash
    php artisan migrate
