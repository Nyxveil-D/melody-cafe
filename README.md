# Melody Cafe

Melody Cafe is a Laravel application for managing cafe operations and content. The project currently focuses on admin authentication, authorization, and menu management.

## Project Status

Active development. The current UI/UX is temporary and not final.

## Features

### Implemented

- Admin authentication: login and logout
- Admin authorization with `UserRole`: `admin`, `manager`, `staff`
- Protected admin routes and admin middleware
- Menu category CRUD
- Menu item CRUD
- Menu item availability management
- Form Request validation
- Dedicated MySQL testing database
- Automated feature tests

### Planned

- Customer-facing website
- Reservation flow
- Contact Us
- About Us
- Menu browsing UI
- My Melody-inspired pastel design
- Responsive UI
- Image upload/storage
- Admin reservation management
- Admin message management

## Tech Stack

- Laravel 13.26.1
- PHP 8.3
- MySQL
- Blade
- Eloquent ORM
- PHPUnit

## Local Development

Requirements:

- PHP 8.3
- Composer
- Node.js and npm
- MySQL

MySQL must be running before migration, seeding, or testing.

```bash
git clone <repository-url>
cd melody-cafe
composer install
npm install
copy .env.example .env
php artisan key:generate
php artisan migrate --seed
npm run dev
php artisan serve
```

Configure `.env` with the local MySQL connection before running migrations. Development database:

```text
DB_DATABASE=laravel
```

Run `npm run dev` and `php artisan serve` in separate terminals when developing with Vite assets.

## Testing

Run the full test suite:

```bash
php artisan test
```

Current result: 24 tests, 56 assertions passing.

Tests use dedicated MySQL database:

```text
DB_DATABASE=melody_cafe_testing
```

Set the testing database connection in the test environment before running tests. Do not use the development database for tests.

## Admin Development Account

Development-only credentials:

```text
Email: admin@melodycafe.test
Password: password
```

These credentials are unsafe for production. Change or remove them before any production deployment.

## Project Structure

- `app/Models` — Eloquent models and relationships
- `app/Http/Controllers/Admin` — Admin controllers
- `app/Http/Requests/Admin` — Admin Form Request validation
- `database/migrations` — Database schema migrations
- `database/factories` — Model factories for tests and seed data
- `database/seeders` — Development seed data
- `resources/views/admin` — Admin Blade views
- `tests/Feature` — Feature tests

## Roadmap

- [x] Database foundation
- [x] Eloquent models
- [x] Factories & seeders
- [x] Admin authentication
- [x] Authorization
- [x] Menu management
- [ ] Code review
- [ ] UI/UX design system
- [ ] Customer-facing website
- [ ] Reservations
- [ ] Contact Us
- [ ] About Us
- [ ] Admin reservation management
- [ ] Admin message management
- [ ] Production hardening

## Notes

This is a development project. UI/UX is not final yet. Development credentials must not be reused in production.

No external-service badges or production deployment instructions are included while project scope remains temporary.

## License

This project is under active development. Licensing details will be added when finalized.
