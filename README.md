# DocPlace — Project Documentation

## 📌 Project Summary
DocPlace is a web app to find doctors and book appointments.  
Patients can sign up, search doctors by specialization, and book visits.  
Admins manage doctors and patients with a dashboard.

---

## 🚀 Main Features
- Public pages: Home, About, Contact, Find Doctors  
- Authentication: Signup, Login, Logout  
- Appointments: logged-in users can book visits  
- Admin dashboard: manage doctors,patients and Appointments
- Doctor dashboard: manage his/her Appointments and Doctor's profile
- Patient Profile: manage his/her profile
---

## 🛠 Tech Stack
- Backend: PHP 8.2, Laravel  
- Frontend: Blade templates, Vanilla JS  
- Database: MySQL / MariaDB  
- Storage: public disk for images
- Git/Github
---

## ⚙ Requirements
- PHP 8.1+ and Composer  
- MySQL or MariaDB  
- Node.js + npm (optional for assets)  
- Git
---

## ⚡ Quick Setup (Any OS)

1. **Open terminal in project folder:**
  ```sh
  cd /path/to/iti-laravel-project
  ```
2. **Install PHP packages:**
  ```sh
  composer install
  ```
3. **Copy env and edit DB settings:**
  ```sh
  cp .env.example .env
  ```
  Edit `.env` values for `DB_HOST`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`
4. **Generate app key:**
  ```sh
  php artisan key:generate
  ```
5. **Run migrations:**
  ```sh
  php artisan migrate
  ```
6. **(Optional) Seed data:**
  ```sh
  php artisan db:seed
  ```
7. **Serve:**
  ```sh
  php artisan serve
  ```
  Open: [http://127.0.0.1:8000](http://127.0.0.1:8000)

*Note: Use `cp` for Linux/macOS, `copy` for Windows. All commands work on any OS with PHP, Composer, and MySQL/MariaDB installed.*

---

## ⚡ Important Routes (short)
- GET / → home (name: `home`)  
- GET /find-doctors → find doctors (`find_doctors`) — public  
- GET /signup, POST /signup → register (`signup`, `signup.submit`)  
- GET /login, POST /login → login (`login`, `login.submit`)  
- POST /logout → logout (`logout`)  
- GET /appointment/create?doctor={id} → appointment form (`appointment.create`) — auth only  
- POST /appointment → store (`appointment.store`) — auth only  
- GET /dashboard → admin area (`dashboard`) — auth + isAdmin

---
## 🔒 Auth Rules

- **After login:**
  - If `role` is `admin` or `doctor` → redirect to `/dashboard`
  - Otherwise → redirect to `/` (home)
- **Logout:**  
  - `POST /logout` clears the session

---

## 📅 Appointment Rules
- Allowed dates: from today up to 2 years from today  
- Validation:
  - appointment date must be >= today
  - appointment date must be <= today + 2 years
  - combined datetime must not exceed end of (today + 2 years)
---

## 🗂 Data Notes
- Doctors: rows in `users` with `role = 'doctor'`  
- Specializations: `specializations` table with `id, user_id, name`  
  - Specialization belongsTo User (user_id)  
  - User hasOne Specialization (by user_id)  
- Appointments table fields: `appointment_at` (datetime), `doctor_id`, `patient_id`, `status`

---

## 📁 Files to Check First
- `routes/web.php` — all routes and controller imports  
- `app/Http/Controllers/Auth/LoginController.php` — login redirect logic  
- `app/Http/Controllers/AppointmentController.php` — date validation (2 years)  
- `app/Http/Controllers/Admin/PatientController.php` — edit/delete logic  
- `resources/views/find_doctors.blade.php` — specialization display  
- `resources/views/auth/login.blade.php`, `signup.blade.php` — forms use POST

---
## 👥 Team & Contributions

- **Back-End Team:**  
  - Mohamed Mamdouh — Dashboard, Home, Profile , middleware
  - Youssef Al-Ansari — Authentication, Find Doctors, appointments , middleware
- **Database Team:**  
  - Youssef Abu Zaid — Database design, JS for front-end  
- **Front-End Team:**  
  - Youssef Michael — Home, About, Signup, Login, Dashboard
  - Bafly Hany — Find Doctors, Contact
---

## 🌍 GitHub Workflow
1. git add .  
2. git commit -m "Describe changes"  
3. git push origin branch-name

If repo not created:
1. git init  
2. git remote add origin <repo-url>  
3. git push -u origin main
---