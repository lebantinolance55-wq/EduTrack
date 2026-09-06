# EduTrack – Student Information Management System

## Local Installation and Setup Guide

### 1. Application Description

**EduTrack** is a Laravel-based Student Information Management System developed to manage and organize student records in a simple web-based interface.

The application provides features for:

* Viewing student records
* Adding new students
* Editing student information
* Deleting student records
* Searching student records
* Viewing academic programs
* Viewing dashboard statistics
* Accessing student information through a REST API

EduTrack is designed to run locally using the Laravel development server and an SQLite database.

---

## 2. System Requirements

Before installing EduTrack, make sure the computer has the following software installed:

| Requirement       | Purpose                                                    |
| ----------------- | ---------------------------------------------------------- |
| PHP 8.2 or higher | Runs the Laravel application                               |
| Composer          | Installs PHP/Laravel dependencies                          |
| SQLite            | Stores the application database                            |
| Web Browser       | Accesses the web application                               |
| Git               | Optional; used for obtaining the project from a repository |

> **Note:** XAMPP or MySQL is not required because EduTrack uses SQLite as its database.

---

# 3. Getting the Project

Obtain a copy of the EduTrack project and place it in a suitable folder on the computer.

For example:

```text
C:\Users\YourName\Documents\EduTrack
```

Open **PowerShell** or **Command Prompt**, then navigate to the project directory:

```powershell
cd C:\Users\YourName\Documents\EduTrack
```

Verify that the Laravel project files are present. The project should contain folders such as:

```text
app
bootstrap
config
database
public
resources
routes
storage
vendor
```

---

# 4. Install PHP Dependencies

Laravel uses Composer to manage its PHP dependencies.

From the EduTrack project directory, run:

```powershell
composer install
```

This command installs the packages required by the application.

If the `vendor` folder is already included in the project, this command can still be executed to verify and install the required dependencies.

---

# 5. Configure the Environment

Laravel uses an `.env` file for environment-specific configuration.

### Important Security Notice

The actual `.env` file is **not included in the project submission** because it is intended for local/private configuration.

Instead, EduTrack includes a **`.env.example` file** that serves as a safe template for local installation.

The installer should create a local `.env` file from this template.

Run:

```powershell
Copy-Item .env.example .env
```

This creates:

```text
.env
```

from:

```text
.env.example
```

The `.env` file is used only for the local installation and should not be uploaded to a public repository or included in the submitted project.

---

# 6. Generate the Application Key

Laravel requires an application encryption key.

Run:

```powershell
php artisan key:generate
```

A successful command should display a message similar to:

```text
Application key set successfully.
```

This generates the `APP_KEY` value in the local `.env` file.

---

# 7. Configure the Database

EduTrack uses **SQLite** for its database.

The database configuration in `.env.example` uses:

```env
DB_CONNECTION=sqlite
```

No MySQL server, XAMPP, or separate database server is required.

The database file is located at:

```text
database/database.sqlite
```

### If the SQLite database file is already included

If `database/database.sqlite` is included with the project, use the existing database file.

Do **not** create another database file unnecessarily.

The included database may contain sample student records used to demonstrate the application's functionality.

### If a fresh database is required

If the SQLite database file is not included, create an empty SQLite database file inside the `database` folder:

```powershell
New-Item database\database.sqlite -ItemType File
```

Then run the migrations:

```powershell
php artisan migrate
```

The migrations create the database tables required by EduTrack.

---

# 8. Run Database Migrations

To create the required database tables, run:

```powershell
php artisan migrate
```

EduTrack includes migrations for the Laravel system tables and the student records table.

The student table is created through the migration:

```text
database/migrations/2026_09_06_102357_create_students_table.php
```

If the database already contains the migrated tables, Laravel may display:

```text
Nothing to migrate.
```

This is normal and means the migrations have already been executed.

---

# 9. Clear Laravel Cache

To make sure the application uses the current configuration, clear Laravel's cached files:

```powershell
php artisan optimize:clear
```

This clears cached configuration, routes, views, and other Laravel caches.

---

# 10. Start the Laravel Application

Start the Laravel development server using:

```powershell
php artisan serve
```

Laravel should display a local address similar to:

```text
INFO  Server running on [http://127.0.0.1:8000].
```

Keep the PowerShell window running while using the application.

---

# 11. Open EduTrack

Open a web browser and go to:

```text
http://127.0.0.1:8000
```

The EduTrack dashboard should appear.

If the application does not load, make sure that:

1. The Laravel server is running.
2. PHP is installed correctly.
3. Composer dependencies have been installed.
4. The `.env` file exists.
5. The application key has been generated.
6. The SQLite database is available.

---

# 12. Main Application Features

After successfully installing EduTrack, the following sections can be accessed from the application navigation.

### Dashboard

The dashboard provides an overview of student information, including:

* Total Students
* Active Students
* Academic Programs
* New Registrations
* Registration Trend
* Program Distribution
* Enrollment Status

### Students

The Students section is used to manage student records.

Users can:

* View students
* Search students
* Add students
* Edit students
* Delete students

### Courses

The Courses section provides information about the academic programs available in the system.

EduTrack currently includes:

* BS Computer Engineering
* BS Information Technology
* BS Hospitality Management
* BS Office Administration

### Settings

The Settings section provides application-related settings and information.

---

# 13. Testing Student Management

After opening the application, the Student Management feature can be tested.

## Add a Student

1. Open **Students** from the sidebar.
2. Click **Add Student**.
3. Enter the required student information.
4. Submit the form.
5. Verify that the new student appears in the student list.

## Edit a Student

1. Open **Students**.
2. Find an existing student.
3. Click the **Edit** button.
4. Modify the information.
5. Save the changes.
6. Verify that the updated information appears in the student list.

## Delete a Student

1. Open **Students**.
2. Find the student to remove.
3. Click the **Delete** button.
4. Confirm the deletion.
5. Verify that the student is removed from the list.

---

# 14. REST API

EduTrack also provides a REST API for managing student records.

The API uses JSON responses and supports the following operations:

| Method | Endpoint                  | Purpose               |
| ------ | ------------------------- | --------------------- |
| GET    | `/api/students`           | Retrieve all students |
| POST   | `/api/students`           | Create a student      |
| GET    | `/api/students/{student}` | Retrieve one student  |
| PUT    | `/api/students/{student}` | Update a student      |
| PATCH  | `/api/students/{student}` | Update a student      |
| DELETE | `/api/students/{student}` | Delete a student      |

---

# 15. Testing the GET API

Make sure the Laravel server is running:

```powershell
php artisan serve
```

Open the following URL in a browser:

```text
http://127.0.0.1:8000/api/students
```

A successful response should return JSON similar to:

```json
{
    "success": true,
    "message": "Students retrieved successfully.",
    "data": []
}
```

If student records exist, they will appear inside the `data` array.

---

# 16. Testing the POST API

The POST endpoint creates a new student record.

Using PowerShell:

```powershell
Invoke-RestMethod -Uri "http://127.0.0.1:8000/api/students" -Method POST -ContentType "application/json" -Body '{"student_id":"DEMO-API-001","name":"API DEMO STUDENT","email":"apidemo@example.com","course":"BS COMPUTER ENGINEERING","status":"Active"}'
```

A successful request creates a new student and returns the newly created record.

> **Note:** The `student_id` and `email` must be unique. If they already exist in the database, Laravel will return a validation error.

---

# 17. Testing the GET Single Student API

After creating or identifying a student, obtain its database ID.

For example:

```text
/api/students/17
```

Open:

```text
http://127.0.0.1:8000/api/students/17
```

Replace `17` with the actual student ID.

The API should return the selected student's information.

---

# 18. Testing the PUT API

The PUT endpoint updates an existing student.

Example PowerShell command:

```powershell
Invoke-RestMethod -Uri "http://127.0.0.1:8000/api/students/17" -Method PUT -ContentType "application/json" -Body '{"student_id":"DEMO-API-001","name":"API DEMO STUDENT UPDATED","email":"apidemo@example.com","course":"BS COMPUTER ENGINEERING","status":"Active"}'
```

Replace `17` with the actual database ID of the student being updated.

A successful request returns the updated student record.

---

# 19. Testing the DELETE API

The DELETE endpoint removes a student record.

Example:

```powershell
Invoke-RestMethod -Uri "http://127.0.0.1:8000/api/students/17" -Method DELETE
```

Replace `17` with the actual database ID.

A successful response should indicate that the student was deleted.

> **Warning:** DELETE permanently removes the selected record from the database. Use a test/demo record when demonstrating this API operation.

---

# 20. Recommended API Demonstration Sequence

For a complete API demonstration, use the following sequence:

```text
POST
 ↓
Create Student
 ↓
GET
 ↓
View Student
 ↓
PUT
 ↓
Update Student
 ↓
GET
 ↓
Verify Update
 ↓
DELETE
 ↓
Remove Student
```

This demonstrates the four main CRUD operations:

| CRUD Operation | HTTP Method | Function       |
| -------------- | ----------- | -------------- |
| Create         | POST        | Add student    |
| Read           | GET         | View student   |
| Update         | PUT/PATCH   | Edit student   |
| Delete         | DELETE      | Remove student |

---

# 21. Troubleshooting

## Problem: `composer` is not recognized

Make sure Composer is installed and added to the system PATH.

Test:

```powershell
composer --version
```

---

## Problem: `php` is not recognized

Make sure PHP is installed and added to the system PATH.

Test:

```powershell
php --version
```

---

## Problem: Application key error

Run:

```powershell
php artisan key:generate
```

---

## Problem: Database error

Check that the SQLite database is available at:

```text
database/database.sqlite
```

If a fresh database is required, create the file and run:

```powershell
php artisan migrate
```

---

## Problem: Changes are not appearing

Run:

```powershell
php artisan optimize:clear
```

Then refresh the browser.

---

## Problem: Port 8000 is already in use

Run Laravel on another port:

```powershell
php artisan serve --port=8001
```

Then open:

```text
http://127.0.0.1:8001
```

---

# 22. Environment File and Submission Security

The following rule should be followed when submitting EduTrack:

### Do NOT include:

```text
.env
```

The `.env` file contains environment-specific configuration and should remain local.

### Include:

```text
.env.example
```

The `.env.example` file acts as a template for creating the local environment configuration.

The installation process is:

```text
.env.example
      ↓
Copy to
      ↓
.env
      ↓
php artisan key:generate
      ↓
Local EduTrack configuration
```

This allows another person to install the application locally without receiving the original developer's private environment configuration.

---

# 23. Important Project Files

The following files and directories are important when installing or understanding EduTrack:

```text
EduTrack/
│
├── app/
│   ├── Http/
│   └── Models/
│
├── database/
│   ├── migrations/
│   └── database.sqlite
│
├── public/
│
├── resources/
│   └── views/
│
├── routes/
│   ├── web.php
│   └── api.php
│
├── .env.example
├── composer.json
├── artisan
└── INSTALLATION.md
```

---

# 24. Complete Installation Command Summary

For a fresh local installation, the main commands are:

```powershell
cd C:\Users\YourName\Documents\EduTrack

composer install

Copy-Item .env.example .env

php artisan key:generate

php artisan migrate

php artisan optimize:clear

php artisan serve
```

Then open:

```text
http://127.0.0.1:8000
```

If the project already contains a configured SQLite database, do not create another database file unnecessarily.

---

# 25. Installation Checklist

Before considering the installation complete, verify the following:

* [ ] PHP is installed
* [ ] Composer is installed
* [ ] EduTrack project has been obtained
* [ ] `composer install` completed successfully
* [ ] `.env.example` is present
* [ ] Local `.env` has been created
* [ ] `php artisan key:generate` completed successfully
* [ ] SQLite database is available
* [ ] Database migrations completed
* [ ] Laravel cache has been cleared
* [ ] Laravel development server is running
* [ ] EduTrack opens in the browser
* [ ] Student management works
* [ ] Courses page works
* [ ] REST API can be accessed

---

# 26. Project Information

**Project Name:** EduTrack
**Project Type:** Student Information Management System
**Framework:** Laravel
**Programming Language:** PHP
**Database:** SQLite
**Frontend:** Blade Templates, HTML, CSS, JavaScript
**API:** REST API
**Environment:** Local Development Environment

---

## End 
