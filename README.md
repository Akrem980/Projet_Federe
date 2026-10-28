# 🏥 Healthcare Portal — Application de Gestion des Rendez-vous Médicaux

[![PHP](https://img.shields.io/badge/PHP-7.4+-777BB4?logo=php&logoColor=white)](https://php.net)
[![MySQL](https://img.shields.io/badge/MySQL-5.5+-4479A1?logo=mysql&logoColor=white)](https://mysql.com)
[![HTML5](https://img.shields.io/badge/HTML5-E34F26?logo=html5&logoColor=white)](https://developer.mozilla.org/en-US/docs/Web/HTML)
[![CSS3](https://img.shields.io/badge/CSS3-1572B6?logo=css3&logoColor=white)](https://developer.mozilla.org/en-US/docs/Web/CSS)
[![JavaScript](https://img.shields.io/badge/JavaScript-ES6-F7DF1E?logo=javascript&logoColor=black)](https://developer.mozilla.org/en-US/docs/Web/JavaScript)

A full-featured web application for managing medical appointments — allowing patients to find doctors, book appointments, and doctors to manage their schedules, built with PHP, MySQL, and vanilla HTML/CSS/JS.

---

## ✨ Features

### 👤 Authentication & Role Management (RBAC)
- Registration for patients and doctors (with specialty & city for doctors)
- Login via email or phone number
- Secure password hashing with bcrypt (`password_hash` / `password_verify`)
- PHP session-based authentication with role-based access control
- Account activation/deactivation by admin

### 🔍 Patient Dashboard
- Search for doctors by **name**, **specialty**, and **city**
- View available time slots via interactive modal (AJAX-powered)
- Book appointments with duplicate-slot prevention
- View upcoming and past appointments with status badges

### 🩺 Doctor Dashboard
- Statistics: Total / Scheduled / Completed / Cancelled appointments
- Three tabs: **Today**, **Upcoming**, **All Appointments**
- Mark appointments as Completed or Cancelled
- Real-time appointment list with patient details

### 🛡️ Admin Dashboard
- Full overview of users, doctors, and appointments
- Manage user accounts (activate/deactivate)
- Manage medical specialties

### ⚙️ User Settings
- Edit profile information (name, email, phone)
- Change password with current password verification

---

## 🛠️ Technologies

| Layer | Technology |
|-------|-----------|
| **Frontend** | HTML5, CSS3 (variables, grid, flexbox), JavaScript ES6, Fetch API |
| **Backend** | PHP 7.4+ (procedural + OOP helpers) |
| **Database** | MySQL 5.5+ |
| **Fonts** | Google Fonts — DM Sans |
| **Server** | Apache (XAMPP / WAMP / LAMP) |

---

## 📁 Project Structure

```
Healthcare_Portal/
├── config.php                      # DB connection, auth helpers, redirects
├── Web_Pages/
│   ├── HealthCare.html             # Landing & Login page
│   └── register.html               # Registration page
├── Process/
│   ├── login_process.php           # Login handler
│   ├── register_process.php        # Registration handler
│   ├── book_appointment.php        # Appointment booking
│   ├── manage_appointment.php      # Mark complete / cancel
│   ├── update_settings.php         # Profile update
│   └── logout.php                  # Session destroy
├── Dashboards/
│   ├── dashboard_patient.php       # Patient dashboard
│   ├── dashboard_doctor.php        # Doctor dashboard
│   ├── dashboard_admin.php         # Admin dashboard
│   ├── find_doctor.php             # Doctor search + booking modal
│   ├── settings.php                # User settings page
│   └── get_slots.php               # AJAX: available time slots (JSON)
├── DataBase/
│   └── medical_appointment_db.sql  # Full database schema + seed data
├── Style css/
│   ├── style.css                   # Main stylesheet
│   └── style2.css                  # Secondary styles
└── Images/
    └── icon.webp                   # App icon
```

---

## 🚀 Installation

### Prerequisites
- PHP 7.4 or higher
- MySQL 5.5 or higher
- A local server: [XAMPP](https://www.apachefriends.org/), [WAMP](https://www.wampserver.com/), or [LAMP](https://ubuntu.com/server/docs/lamp-applications)

### Step-by-Step Setup

**1. Clone the repository**
```bash
git clone https://github.com/YOUR_USERNAME/healthcare-portal.git
cd healthcare-portal
```

**2. Move to your server's web root**
```bash
# XAMPP (Windows)
mv healthcare-portal C:/xampp/htdocs/

# XAMPP (macOS)
mv healthcare-portal /Applications/XAMPP/htdocs/

# LAMP (Linux)
mv healthcare-portal /var/www/html/
```

**3. Start Apache and MySQL** in your XAMPP/WAMP control panel (or via `systemctl` on Linux).

---

## 🗄️ Database Setup

**4. Open phpMyAdmin** — navigate to `http://localhost/phpmyadmin`

**5. Create the database**
- Click **"New"** in the left sidebar
- Name it: `medical_appointment_db`
- Encoding: `utf8_general_ci`
- Click **Create**

**6. Import the SQL file**
- Select the `medical_appointment_db` database
- Click the **Import** tab
- Choose file: `DataBase/medical_appointment_db.sql`
- Click **Go**

**7. Verify** — the following tables should appear:
`users`, `patients`, `doctors`, `appointments`, `specialties`, `blocked_slots`

---

## ⚙️ Configuration

**8. Edit `config.php`** if your database credentials differ:

```php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');   // Change if needed
define('DB_PASSWORD', '');        // Add your password if set
define('DB_NAME', 'medical_appointment_db');
```

---

## 🌐 Running the Application

**9. Open your browser** and navigate to:

```
http://localhost/healthcare-portal/Web_Pages/HealthCare.html
```

**10. Create accounts** — register as a patient, then as a doctor (with specialty and city), then test the full booking flow.

---

## 📸 Screenshots

| Page | Description |
|------|-------------|
| ![Landing Page](screenshots/landing.png) | Landing & Login page |
| ![Register](screenshots/register.png) | Registration with role selection |
| ![Patient Dashboard](screenshots/patient_dashboard.png) | Patient appointment overview |
| ![Find Doctor](screenshots/find_doctor.png) | Doctor search with filters |
| ![Booking Modal](screenshots/booking_modal.png) | Time slot selection modal |
| ![Doctor Dashboard](screenshots/doctor_dashboard.png) | Doctor appointment management |

> *Replace placeholder paths with actual screenshots before submission.*

---

## 🔐 Default Roles & Access

| Role | Access |
|------|--------|
| `patient` | Dashboard, Find Doctors, Book Appointments, Settings |
| `doctor` | Dashboard (appointments), Settings |
| `admin` | Full system access (users, appointments, specialties) |

---

## 🗓️ Project Methodology

This project was developed using the **Scrum Agile** framework across **3 Sprints**:

| Sprint | Focus | Duration |
|--------|-------|----------|
| Sprint 1 | Authentication, DB design, base UI | 2 weeks |
| Sprint 2 | Core features (search, booking, dashboards) | 2 weeks |
| Sprint 3 | Settings, Admin, Polish, Release v1.0 | 2 weeks |

---

## 👨‍💻 Authors

| Name | Role |
|------|------|
| **[Author 1]** | Full Stack Developer |
| **[Author 2]** | Backend / Database |
| **[Author 3]** | Frontend / UI Design |
| **[Author 4]** | Scrum Master / Product Owner |

**Academic Program:** LSI2 — Génie Logiciel  
**University:** [Your University Name]  
**Year:** 2025–2026

---

## 📄 License

This project is developed for academic purposes as part of a final year university project.

---

*Healthcare Portal v1.0 — Final Release*
