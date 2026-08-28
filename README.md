# Pinagbayanan University Student Registration System

## Project Description

The **Pinagbayanan University Student Registration System** is a web-based student registration application developed using Laravel. It allows students to submit their personal, contact, and academic information together with a profile picture through an organized online form.

The system validates submitted information on the server, securely stores student records in a MySQL database, saves uploaded profile pictures through Laravel Storage, and displays the registered student's information on a profile page after a successful registration.

The project was created for the ITST 302 – Client-Server Technologies Week 4 Laboratory Activity and demonstrates Laravel form processing, request handling, validation, flash messages, file upload, database integration, Blade templates, and Git version control.

---

# Features

## Student Registration Form

The registration form collects the following required student information:

- Student ID
- First Name
- Middle Name (optional)
- Last Name
- Email Address
- Mobile Number
- Date of Birth
- Gender
- Program
- Year Level
- Complete Address
- Profile Picture

## Server-Side Validation

Laravel validation is used to prevent incomplete or invalid submissions. The current implementation includes:

- Required field validation
- Unique Student ID validation
- Unique email address validation
- Valid email format checking
- Numeric mobile number validation
- Date of birth validation
- Gender selection validation
- Program and year level validation
- Image-only profile picture validation
- JPG, JPEG, and PNG file restrictions
- Maximum profile picture size of 2 MB

When validation fails, the form displays clear error messages and keeps previously entered values where appropriate.

## Profile Picture Upload and Preview

Students can select a profile picture before submitting the form. A browser-side preview is displayed so the student can confirm the selected image before registration.

Accepted formats:

- JPG
- JPEG
- PNG

Maximum file size:

- 2 MB

Uploaded files are stored using Laravel's `public` storage disk, while only the stored file path is saved in the database.

## Flash Messages

After successful registration, the system displays a success notification confirming that the student's information was saved.

## Student Profile Display

After registration, the system redirects to a student profile page showing:

- Profile Picture
- Student ID
- Full Name
- Email Address
- Mobile Number
- Date of Birth
- Gender
- Program
- Year Level
- Complete Address

## Registered Students Page

The system also includes a student records page that displays the currently registered students and provides access to each student's profile.

---

# Objectives

This project was developed to accomplish the following objectives:

1. Create a responsive registration form using Laravel Blade templates.
2. Process client requests using Laravel routes and a controller.
3. Apply server-side validation to submitted student information.
4. Prevent duplicate Student IDs and email addresses.
5. Upload and securely store student profile pictures.
6. Store student records in a MySQL database using Eloquent ORM.
7. Display flash messages after successful operations.
8. Display registered student information through a profile page.
9. Understand the Laravel request lifecycle from browser request to response.
10. Practice meaningful Git commits and proper project documentation.

---

# Technologies Used

## Frontend

- HTML5
- CSS3
- JavaScript
- Laravel Blade Templates
- Vite

## Backend

- Laravel Framework
- PHP

## Database

- MySQL

## Development Tools

- Visual Studio Code
- Composer
- Node.js and npm
- Git and GitHub
- phpMyAdmin / MySQL

---

# Color Palette and Interface Design

The user interface uses a clean university registration layout with an orange, white, and black color palette.

| Purpose | Color |
| --- | --- |
| Primary Orange | `#EE7944` |
| Dark Orange | `#D96532` |
| White | `#FFFFFF` |
| Main Text | `#111111` |
| Muted Text | `#696969` |
| Light Background | `#F7F7F5` |
| Border | `#E5E5E2` |

The design uses a simple and professional layout with grouped form sections, clear labels, responsive cards, validation states, profile image preview, and consistent spacing.

---

# Database Structure

The project uses the following MySQL database:

```text
student_registrationDB
```

The main table is:

```text
students
```

The `students` table stores the student's personal information, contact details, academic information, uploaded profile picture path, and timestamps.

## Students Table Fields

| Field | Description |
| --- | --- |
| `id` | Primary key |
| `student_id` | Unique student identification number |
| `first_name` | Student first name |
| `middle_name` | Optional student middle name |
| `last_name` | Student last name |
| `email` | Unique student email address |
| `mobile_number` | Student contact number |
| `date_of_birth` | Student birth date |
| `gender` | Student gender |
| `program` | Student academic program |
| `year_level` | Student current year level |
| `address` | Student complete address |
| `profile_picture` | Stored profile picture path |
| `created_at` | Record creation timestamp |
| `updated_at` | Record update timestamp |

### Important Constraints

- `id` is the primary key.
- `student_id` must be unique.
- `email` must be unique.
- `middle_name` is optional.
- `profile_picture` stores the uploaded image path instead of the image itself.

---

# Laravel Request Lifecycle

When a student submits the registration form, the request follows this process:

```text
Browser / Student
       ↓
Registration Form (Blade)
       ↓
Route (web.php)
       ↓
StudentController@store
       ↓
Laravel Validation
       ↓
Profile Picture Storage
       ↓
Student Model / Eloquent
       ↓
MySQL Database
       ↓
Redirect + Flash Message
       ↓
Student Profile Blade View
       ↓
Browser Response
```

1. The student opens the registration form in the browser.
2. Laravel routes the request to the appropriate method in `StudentController`.
3. The controller validates all submitted information.
4. If validation fails, Laravel redirects back to the form and displays validation errors.
5. If validation succeeds, the profile picture is stored using Laravel Storage.
6. The validated student information is saved through the `Student` model.
7. Laravel redirects the student to the profile page with a success flash message.
8. The browser displays the final registered student information.

Diagram file:

```text
documentation/laravel-request-lifecycle.png
```

---

# Validation Rules

| Field | Validation | Purpose |
| --- | --- | --- |
| Student ID | Required, string, unique | Prevents missing and duplicate IDs |
| First Name | Required, string | Ensures the student's first name is provided |
| Middle Name | Nullable, string | Allows students without a middle name |
| Last Name | Required, string | Ensures the student's last name is provided |
| Email | Required, valid email, unique | Prevents invalid and duplicate email addresses |
| Mobile Number | Required, numeric | Ensures contact information contains numbers |
| Date of Birth | Required, valid date, not future | Prevents invalid future birth dates |
| Gender | Required | Ensures a selection is made |
| Program | Required | Stores the student's academic program |
| Year Level | Required | Stores the student's current year level |
| Address | Required, string | Ensures a complete address is provided |
| Profile Picture | Required, image, JPG/JPEG/PNG, max 2 MB | Restricts invalid or oversized uploads |

Server-side validation is important because client-side controls can be bypassed. Laravel validates the request again on the server before any student record is saved.

---

# Registration Flowchart

The registration process follows this flow:

```text
Start
  ↓
Open Registration Page
  ↓
Fill Out Student Form
  ↓
Select Profile Picture
  ↓
Submit Registration
  ↓
Laravel Validation
  ↓
Is the Data Valid?
  ├── No → Display Validation Errors → Return to Form
  │
  └── Yes
        ↓
     Upload Profile Picture
        ↓
     Save Student to MySQL
        ↓
     Display Success Message
        ↓
     Show Student Profile
        ↓
       End
```

Diagram file:

```text
documentation/registration-flowchart.png
```

---

# Database ER Diagram

The project currently uses one main entity: `students`. Each row represents one registered student.

```text
STUDENTS
────────────────────────────
PK  id
UQ  student_id
    first_name
    middle_name
    last_name
UQ  email
    mobile_number
    date_of_birth
    gender
    program
    year_level
    address
    profile_picture
    created_at
    updated_at
```

Diagram file:

```text
documentation/database-er-diagram.png
```

---

# Main Laravel Files

```text
app/
├── Http/
│   └── Controllers/
│       └── StudentController.php
└── Models/
    └── Student.php

database/
└── migrations/
    └── xxxx_xx_xx_xxxxxx_create_students_table.php

resources/
├── css/
│   └── app.css
├── js/
│   └── app.js
└── views/
    ├── layouts/
    │   └── app.blade.php
    └── students/
        ├── create.blade.php
        ├── index.blade.php
        └── show.blade.php

routes/
└── web.php
```

---

# Routes

| Method | URL | Purpose |
| --- | --- | --- |
| GET | `/` | Redirects to the registration form |
| GET | `/register` | Displays the student registration form |
| POST | `/register` | Validates and stores student information |
| GET | `/students` | Displays registered students |
| GET | `/students/{student}` | Displays an individual student profile |

---

# Installation Guide

## 1. Clone the Repository

```bash
git clone https://github.com/Dhenzelrainn/week04-student-registration.git
```

Enter the project folder:

```bash
cd week04-student-registration
```

## 2. Install PHP Dependencies

```bash
composer install
```

## 3. Install Frontend Dependencies

```bash
npm install
```

## 4. Create the Environment File

On Windows Command Prompt:

```bash
copy .env.example .env
```

Or manually duplicate `.env.example` and rename the copy to `.env`.

## 5. Generate the Application Key

```bash
php artisan key:generate
```

## 6. Create the MySQL Database

```sql
CREATE DATABASE student_registrationDB;
```

Configure `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=student_registrationDB
DB_USERNAME=root
DB_PASSWORD=
```

## 7. Run the Database Migration

```bash
php artisan migrate
```

## 8. Create the Storage Link

```bash
php artisan storage:link
```

This allows uploaded profile pictures stored in `storage/app/public` to be displayed from the browser.

## 9. Build or Run Frontend Assets

For development:

```bash
npm run dev
```

Or create a production build:

```bash
npm run build
```

## 10. Run the Laravel Application

In another terminal:

```bash
php artisan serve
```

Open:

```text
http://127.0.0.1:8000/register
```

---

# Testing

## Valid Registration Test

Test the system using complete and valid information.

Expected result:

- Validation passes.
- The profile picture is uploaded.
- The student record is stored in MySQL.
- A success flash message appears.
- The student profile page is displayed.

## Invalid Registration Test

Submit the form with one or more missing or invalid values.

Expected result:

- Validation errors are displayed.
- Previously entered values remain where appropriate.
- The invalid record is not stored in the database.

## Duplicate Student ID Test

Register another student using an existing Student ID.

Expected result:

- Laravel displays a duplicate Student ID validation error.
- The second record is not saved.

## Invalid Image Test

Upload a file that is not JPG, JPEG, or PNG, or use an image larger than 2 MB.

Expected result:

- Laravel rejects the file.
- A profile picture validation message is displayed.

---

# Screenshots

Store project screenshots inside the `screenshots/` folder.

Recommended screenshots:

1. Student Registration Form
2. Validation Errors
3. Profile Picture Preview
4. Successful Registration / Flash Message
5. Student Profile Page
6. Registered Students Page
7. Uploaded Profile Picture
8. MySQL `students` Table
9. VS Code Project Structure
10. GitHub Repository
11. Terminal Output
12. Browser Output

Example structure:

```text
screenshots/
├── registration-form.png
├── validation-errors.png
├── profile-picture-preview.png
├── flash-success.png
├── student-profile.png
├── registered-students.png
├── database-records.png
├── project-structure.png
├── github-repository.png
└── terminal-output.png
```

---

# Problems Encountered and Solutions

## 1. Vite Manifest Not Found

### Problem

The application displayed a `ViteManifestNotFoundException` because Laravel could not find `public/build/manifest.json`.

### Solution

The frontend dependencies were installed and Vite was built using:

```bash
npm install
npm run build
```

During development, `npm run dev` can also be kept running while Laravel is running in another terminal.

## 2. Profile Picture Preview Not Displaying

### Problem

The selected file name changed correctly, but the selected image was not appearing inside the profile preview box.

### Solution

The CSS was updated so the HTML `hidden` attribute could not be overridden by the preview placeholder's `display: flex` rule. The preview image was also positioned to fill the preview container correctly.

```css
[hidden] {
    display: none !important;
}
```

## 3. Uploaded Profile Picture Not Accessible

### Problem

An uploaded image may be stored successfully but cannot be displayed publicly if the storage symbolic link has not been created.

### Solution

The Laravel storage link is created using:

```bash
php artisan storage:link
```

This connects `public/storage` to Laravel's public storage directory.

---

# Reflection

Developing the **Pinagbayanan University Student Registration System** helped me understand that a registration feature is more than just creating a form and saving data. Before working on this activity, I mainly thought about the visible part of a form, such as the text fields, buttons, and layout. While building the project, I learned that the server also needs to carefully check every request before the information can be accepted. This made me understand why validation is one of the most important parts of a web-based registration system.

One of the main lessons I learned was how Laravel handles user input. The registration form sends a request to a route, and the route sends it to the controller. The controller then validates the submitted information before allowing the model to save it in the database. I learned that required fields help prevent incomplete records, while unique validation for the Student ID and email address helps prevent duplicate information. Email and numeric validation are also useful because they reduce incorrect data being stored in the system. Seeing this process work helped me understand the connection between the browser, routes, controllers, models, database, and Blade views.

I also learned the difference between client-side and server-side validation. Browser controls can make a form easier to use, but they should not be the only protection because users may still bypass them. Server-side validation is more reliable because Laravel checks the request on the server before saving anything to MySQL. This is important in real systems because database records should remain accurate and consistent even when invalid requests are sent to the application.

Another important part of the activity was handling profile picture uploads. I learned that uploaded files should be checked before they are accepted. The system only allows image files in JPG, JPEG, and PNG formats and limits the file size to 2 MB. I also learned how Laravel Storage works and why `php artisan storage:link` is needed to display uploaded files from the browser. Adding an image preview also improved the user experience because students can see the selected picture before submitting the form.

I encountered several technical problems during development. One problem was the missing Vite manifest, which prevented the page from loading until the frontend assets were installed and built. I also encountered an issue where the selected profile picture did not appear in the preview box even though the file name changed. Fixing these issues taught me to inspect both Laravel errors and frontend behavior instead of immediately changing unrelated parts of the project.

Overall, this project improved my understanding of Laravel development, MySQL integration, validation, file handling, and request processing. It also showed me why registration systems are common in universities, companies, hospitals, and other organizations. These systems need to collect information in an organized way while preventing invalid data from reaching the database. After completing this activity, I have a clearer understanding of how different Laravel components work together to create a functional, secure, and user-friendly web application.

---

# Git and GitHub

Repository:

```text
https://github.com/Dhenzelrainn/week04-student-registration
```

The project should contain at least 10 meaningful commits. Examples used during development can include:

```text
feat: create student migration
feat: create student model
feat: implement student registration controller and routes
feat: build student registration form
feat: implement validation rules
feat: add profile picture upload
feat: add profile picture preview
feat: add registration flash message
feat: display registered student profile
feat: add registered students page
fix: resolve profile image preview issue
fix: resolve Vite manifest issue
docs: complete project README
```

---

# References

Laravel. (2026). *Laravel documentation*. https://laravel.com/docs

MDN Web Docs. (n.d.). *Web forms*. Mozilla. https://developer.mozilla.org/en-US/docs/Learn_web_development/Extensions/Forms

MySQL. (n.d.). *MySQL documentation*. https://dev.mysql.com/doc/

PHP. (n.d.). *PHP manual*. https://www.php.net/docs.php

Vite. (n.d.). *Vite documentation*. https://vite.dev/guide/

---

# Author
Dhenzel Rain Cruz

Developed for **ITST 302 – Client-Server Technologies**  
**Pinagbayanan University Student Registration System**  
2026
