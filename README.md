# DocPlace — Project README

A concise, professional README for developers and DevOps to set up and run the DocPlace Laravel application.

## Overview
DocPlace is a Laravel-based appointment booking system for doctors and patients. Core features:
- Public pages: Home, About, Contact, Find Doctors
- Authentication: Signup, Login, Logout
- Appointment booking (protected by auth checks)
- Admin dashboard for management

## Requirements
- PHP 8.1+ (tested on PHP 8.2.29)
- Composer
- MySQL / MariaDB
- Node.js + npm (optional, for frontend assets)
- Git (recommended)

## Quick Setup (Windows)
1. Clone repo and install dependencies:
   - composer:
     ```
     composer install
     ```
   - node (if using frontend tooling):
     ```
     npm install
     npm run dev
     ```
2. Environment:
   ```
   copy .env.example .env
   ```
   Edit `.env` and set DB credentials.
3. Generate app key:
   ```
   php artisan key:generate
   ```
4. Migrate and optionally seed:
   ```
   php artisan migrate
   php artisan db:seed
   ```
   (Create an admin user via seeder or manually if needed.)
5. Serve:
   ```
   php artisan serve
   ```
   Visit: http://127.0.0.1:8000

## Important Routes
- Public:
  - GET / → home (route name: `home`)
  - GET /about-us → about (`about_us`)
  - GET /contact-us → contact (`contact_us`)
  - GET /find-doctors → find doctors (`find_doctors`)
- Auth:
  - GET /signup → show sign up (`signup`)
  - POST /signup → register (`signup.submit`)
  - GET /login → show login (`login`)
  - POST /login → authenticate (`login.submit`)
  - POST /logout → logout (`logout`)
- Appointments:
  - GET /appointment/create?doctor={id} → create form (`appointment.create`)
  - POST /appointment → store (`appointment.store`)
- Dashboard (protected by `auth`):
  - GET /dashboard (`dashboard`) and related admin routes

## Auth / Redirect Behavior
- After login:
  - Admins → redirected to `/dashboard`
  - Non-admins → redirected to `/` (home)
- Logout uses POST to `/logout` which terminates the session and redirects to `/`.

## Frontend Alerts & Booking UX
- SweetAlert2 is used for success/error popups.
- Booking from `find_doctors`:
  - If user is not authenticated, JS shows a SweetAlert:
    - Confirm button labeled "Login" directs to the login page.
    - Footer link or timeout (10s) redirects to `find_doctors`.
  - If authenticated, user is taken to appointment form.
- Success alert after booking is a draggable SweetAlert with styled confirm button (blue).

## Data / Validation Notes
- appointments.appointment_at must be a valid DATETIME; the controller validates date/time and rejects unrealistic years (>9999).
- Ensure Appointment model has the correct `$fillable` fields and the DB column types match (appointment_at -> datetime).

## Troubleshooting (Common Issues)
- BindingResolutionException for controller class:
  - Ensure `use` statements in `routes/web.php` reference the correct controller namespaces.
- Blade syntax errors:
  - Remove stray `<?php` from Blade files; Blade templates must start with HTML/Blade directives.
- Login appears with query string (?email=...):
  - Ensure login form uses POST and action points to `route('login.submit')`.
- "Call to undefined method ...::index()":
  - Ensure controllers referenced by routes implement the referenced methods (e.g., `DashboardController@index`).

## Recommended Improvements
- Move validation logic into FormRequest classes.
- Add a seeder to create a default admin user:
  - `php artisan make:seeder AdminUserSeeder`
- Add automated tests for auth and appointment flows.
- Use Laravel Jetstream/ Breeze if richer auth scaffolding is desired.

## Useful Commands
- Run migrations: `php artisan migrate`
- Run seeders: `php artisan db:seed`
- Start dev server: `php artisan serve`
- Create middleware: `php artisan make:middleware CheckRole`
- Make controller: `php artisan make:controller ExampleController`

---

If you want, I can:
- Add an Admin seeder file.
- Add FormRequests for appointment validation.
- Add a short CONTRIBUTING.md for pull request workflow.