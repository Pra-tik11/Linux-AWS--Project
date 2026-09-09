# 🎓 CampusConnect 2026

A professional **Student Registration and Login Web Application** deployed on an **Amazon Linux EC2 server using Apache HTTP Server, PHP, and MariaDB/MySQL**.

CampusConnect 2026 provides a simple and secure platform where students can register for campus events and authenticate using their **Email or Student ID**.

---

## 📌 Project Overview

**CampusConnect 2026** is a web-based student event registration system designed to demonstrate the deployment of a dynamic PHP application on an AWS EC2 Linux server.

The application provides:

- Student Registration
- Student Login
- Email / Student ID Authentication
- Password Hashing
- Database Integration
- Session-Based Authentication
- Login Validation
- Responsive Web Interface
- Apache Web Server Deployment
- AWS EC2 Hosting

---

## 🎯 Project Objectives

1. Build a functional student registration system.
2. Store student information securely in a relational database.
3. Implement authentication using Email or Student ID.
4. Protect passwords using secure password hashing.
5. Deploy the application on an AWS EC2 instance.
6. Configure Apache as the web server.
7. Provide a responsive and professional user interface.
8. Demonstrate cloud deployment and Linux server administration.

---

# 🏗️ System Architecture Diagram

```text
                         ┌──────────────────────┐
                         │       STUDENT        │
                         │  Web Browser / PC    │
                         └──────────┬───────────┘
                                    │
                                    │ HTTP : 80
                                    ▼
                         ┌──────────────────────┐
                         │       AWS EC2        │
                         │    Amazon Linux      │
                         │                      │
                         │  Public IP Address   │
                         └──────────┬───────────┘
                                    │
                                    ▼
                         ┌──────────────────────┐
                         │       APACHE         │
                         │     Web Server       │
                         └──────────┬───────────┘
                                    │
                                    ▼
                         ┌──────────────────────┐
                         │         PHP          │
                         │  Application Layer   │
                         │                      │
                         │  ┌────────────────┐  │
                         │  │ Registration   │  │
                         │  │ Login          │  │
                         │  │ Sessions       │  │
                         │  │ Validation     │  │
                         │  └────────────────┘  │
                         └──────────┬───────────┘
                                    │
                                    │ SQL
                                    ▼
                         ┌──────────────────────┐
                         │   MariaDB / MySQL    │
                         │                      │
                         │ Database:            │
                         │ campusconnect        │
                         │                      │
                         │ Table: students      │
                         └──────────────────────┘
```

---

# ☁️ AWS Deployment Architecture

```text
                         INTERNET
                            │
                            ▼
                  ┌─────────────────────┐
                  │   AWS EC2 Instance  │
                  │                     │
                  │   Amazon Linux      │
                  │                     │
                  │  ┌───────────────┐  │
                  │  │ Security      │  │
                  │  │ Group         │  │
                  │  │               │  │
                  │  │ HTTP  : 80    │  │
                  │  │ SSH   : 22    │  │
                  │  └───────┬───────┘  │
                  │          │          │
                  │  ┌───────▼───────┐  │
                  │  │    Apache     │  │
                  │  └───────┬───────┘  │
                  │          │          │
                  │  ┌───────▼───────┐  │
                  │  │      PHP      │  │
                  │  └───────┬───────┘  │
                  │          │          │
                  │  ┌───────▼───────┐  │
                  │  │    MariaDB    │  │
                  │  └───────────────┘  │
                  └─────────────────────┘
```

---

# 🔄 Application Workflow Diagram

```text
                         START
                           │
                           ▼
                ┌─────────────────────┐
                │ CampusConnect 2026  │
                │     Home Page       │
                └──────────┬──────────┘
                           │
                 ┌─────────┴─────────┐
                 │                   │
                 ▼                   ▼
        ┌────────────────┐   ┌────────────────┐
        │   REGISTER     │   │     LOGIN      │
        └───────┬────────┘   └───────┬────────┘
                │                    │
                ▼                    ▼
        ┌────────────────┐   ┌────────────────┐
        │ Student Details│   │ Email / ID     │
        │ + Password     │   │ + Password     │
        └───────┬────────┘   └───────┬────────┘
                │                    │
                ▼                    ▼
        ┌────────────────┐   ┌────────────────┐
        │ PHP Validation │   │ Database Query  │
        └───────┬────────┘   └───────┬────────┘
                │                    │
                ▼              ┌─────┴─────┐
        ┌────────────────┐     │           │
        │ MariaDB/MySQL  │     ▼           ▼
        │ Store Student  │   VALID       INVALID
        └───────┬────────┘     │           │
                │              ▼           ▼
                ▼       ┌────────────┐ ┌───────────────┐
        ┌────────────────┐ │  Welcome  │ │ Invalid user │
        │ Registration   │ │   Page    │ │ or password  │
        │  Successful    │ └────────────┘ └───────────────┘
        └────────────────┘
```

---

# 🛠️ Technologies Used

| Technology | Purpose |
|---|---|
| AWS EC2 | Cloud server hosting |
| Amazon Linux | Server operating system |
| Apache HTTP Server | Web server |
| PHP | Backend/application logic |
| MariaDB / MySQL | Database |
| HTML5 | Web page structure |
| CSS3 | UI design and responsive layout |
| SQL | Database operations |
| Linux Shell | Server administration |
| Git/GitHub | Version control |

---

# 📂 Project Structure

```text
CampusConnect-2026/
│
├── index.php
│   └── Main landing page
│
├── register.php
│   └── Student registration page
│
├── login.php
│   └── Student authentication page
│
├── welcome.php
│   └── Successful login page
│
├── logout.php
│   └── Session logout
│
├── db.php
│   └── Database connection
│
├── screenshots/
│   ├── home-page.png
│   ├── registration-page.png
│   ├── login-page.png
│   └── welcome-page.png
│
├── .gitignore
│
└── README.md
```

---

# 📝 Application Features

## 1. Home Page

The landing page provides navigation to:

- Student Registration
- Student Login

```text
http://SERVER-IP/campusconnect/
```

---

## 2. Student Registration

Students can register using:

| Field | Required |
|---|---|
| Full Name | Yes |
| Student ID | Yes |
| Email | Yes |
| College Name | Yes |
| Location | Yes |
| Event | Yes |
| Password | Yes |

---

## 3. Student Login

Students can log in using:

```text
Email / Student ID
Password
```

The application verifies the credentials against the database.

---

## 4. Successful Login

Valid credentials display:

```text
Welcome to CampusConnect!
```

The student's name is also displayed.

---

## 5. Invalid Login

Invalid credentials display:

```text
Invalid username or password.
```

---

# 🔐 Security Features

### Password Hashing

Passwords are stored using PHP's secure hashing functions:

```php
password_hash()
```

Passwords are verified using:

```php
password_verify()
```

### Prepared SQL Statements

Prepared statements are used to reduce SQL injection risk:

```php
$stmt = $conn->prepare($sql);
$stmt->bind_param(...);
```

### Session Authentication

PHP sessions maintain authenticated users:

```php
session_start();

$_SESSION["student_id"] = $student["student_id"];
$_SESSION["full_name"] = $student["full_name"];
```

### Protected Welcome Page

Unauthenticated users are redirected to the login page.

---

# 🗄️ Database Design

Database:

```text
campusconnect
```

Table:

```text
students
```

## Students Table

| Column | Data Type | Description |
|---|---|---|
| id | INT | Primary key |
| full_name | VARCHAR(100) | Student full name |
| student_id | VARCHAR(50) | Unique student ID |
| email | VARCHAR(100) | Student email |
| college_name | VARCHAR(150) | College name |
| location | VARCHAR(100) | Student location |
| event | VARCHAR(150) | Registered event |
| password | VARCHAR(255) | Hashed password |
| created_at | TIMESTAMP | Registration time |

---

# 🧩 Database Relationship Diagram

```text
┌──────────────────────────────────────────┐
│                 students                 │
├──────────────────────────────────────────┤
│ PK  id             INT                   │
│     full_name      VARCHAR(100)          │
│ UQ  student_id     VARCHAR(50)           │
│ UQ  email          VARCHAR(100)          │
│     college_name   VARCHAR(150)          │
│     location       VARCHAR(100)          │
│     event          VARCHAR(150)          │
│     password       VARCHAR(255)          │
│     created_at     TIMESTAMP             │
└──────────────────────────────────────────┘
```

---

# ☁️ AWS Infrastructure

The application is deployed on:

```text
AWS EC2
   │
   ├── Amazon Linux
   │
   ├── Apache
   │
   ├── PHP
   │
   └── MariaDB
```

The application is accessed through the EC2 public IP address.

---

# 🚀 Deployment Guide

## Step 1 — Launch EC2

Create an EC2 instance using Amazon Linux.

Make sure SSH access is available.

---

## Step 2 — Connect to EC2

```bash
ssh -i your-key.pem ec2-user@YOUR-PUBLIC-IP
```

---

## Step 3 — Update Server

```bash
sudo dnf update -y
```

---

## Step 4 — Install Apache

```bash
sudo dnf install -y httpd
```

Start Apache:

```bash
sudo systemctl enable --now httpd
```

Check status:

```bash
sudo systemctl status httpd
```

---

## Step 5 — Install PHP

```bash
sudo dnf install -y php php-mysqlnd
```

Restart Apache:

```bash
sudo systemctl restart httpd
```

---

## Step 6 — Install MariaDB

```bash
sudo dnf install -y mariadb105-server
```

Start MariaDB:

```bash
sudo systemctl enable --now mariadb
```

Check:

```bash
sudo systemctl status mariadb
```

---

# 🗃️ Database Configuration

Enter MariaDB:

```bash
sudo mysql
```

Create the database:

```sql
CREATE DATABASE campusconnect;
```

Create the database user:

```sql
CREATE USER 'campususer'@'localhost'
IDENTIFIED BY 'YOUR_STRONG_PASSWORD';
```

Grant permissions:

```sql
GRANT ALL PRIVILEGES ON campusconnect.*
TO 'campususer'@'localhost';
```

Apply:

```sql
FLUSH PRIVILEGES;
```

Select database:

```sql
USE campusconnect;
```

Create table:

```sql
CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    student_id VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    college_name VARCHAR(150) NOT NULL,
    location VARCHAR(100) NOT NULL,
    event VARCHAR(150) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

Exit:

```sql
EXIT;
```

---

# 📁 Deploy Application

Create the application directory:

```bash
sudo mkdir -p /var/www/html/campusconnect
```

Copy project files into:

```text
/var/www/html/campusconnect/
```

Set ownership:

```bash
sudo chown -R apache:apache /var/www/html/campusconnect
```

Set permissions:

```bash
sudo chmod -R 755 /var/www/html/campusconnect
```

Restart Apache:

```bash
sudo systemctl restart httpd
```

---

# 🔑 Database Connection

Configure `db.php`:

```php
<?php

$host = "localhost";
$dbname = "campusconnect";
$username = "campususer";
$password = "YOUR_STRONG_PASSWORD";

$conn = new mysqli(
    $host,
    $username,
    $password,
    $dbname
);

if ($conn->connect_error) {
    die("Database connection failed.");
}

$conn->set_charset("utf8mb4");

?>
```

> **Security:** Do not commit production database credentials to a public GitHub repository.

---

# 🔒 AWS Security Group

Configure the EC2 Security Group:

| Protocol | Port | Source | Purpose |
|---|---:|---|---|
| TCP | 22 | Your IP | SSH |
| TCP | 80 | 0.0.0.0/0 | HTTP |

Do **not** expose MySQL/MariaDB port `3306` publicly when the database is local to the EC2 instance.

---

# 🌍 Access the Application

Find the server public IP:

```bash
curl http://checkip.amazonaws.com
```

Open:

```text
http://YOUR-PUBLIC-IP/campusconnect/
```

Registration:

```text
http://YOUR-PUBLIC-IP/campusconnect/register.php
```

Login:

```text
http://YOUR-PUBLIC-IP/campusconnect/login.php
```

---

# 🧪 Testing

## Registration Test

Example:

```text
Full Name: Rahul Patil
Student ID: STU1001
Email: rahul@example.com
College Name: ABC College
Location: Pune
Event: Technical Fest
Password: ********
```

Expected:

```text
Registration successful! You can now login.
```

## Login Test

```text
Email / Student ID: rahul@example.com
Password: ********
```

Expected:

```text
Welcome to CampusConnect!
```

## Student ID Login

```text
Email / Student ID: STU1001
Password: ********
```

Expected:

```text
Welcome to CampusConnect!
```

## Invalid Login

```text
Email / Student ID: wrong@example.com
Password: wrongpassword
```

Expected:

```text
Invalid username or password.
```

---

# 📊 Project Highlights

This project demonstrates practical experience with:

- AWS EC2
- Amazon Linux
- Apache HTTP Server
- PHP
- MariaDB/MySQL
- SQL
- HTML5
- CSS3
- Linux Administration
- Web Application Deployment
- Database Integration
- Authentication
- Session Management
- Password Hashing
- AWS Security Groups
- Cloud Networking
- Git/GitHub

---

# 🔮 Future Enhancements

Possible production-level improvements:

- Admin Dashboard
- Student Dashboard
- Event Management
- Forgot Password
- Email Verification
- OTP Authentication
- Profile Management
- Event History
- Certificate Downloads
- Admin Analytics
- HTTPS / SSL
- AWS Route 53
- Amazon RDS
- Amazon S3
- Application Load Balancer
- Auto Scaling
- CloudWatch Monitoring
- Automated Backups
- CI/CD Pipeline

---

# 🔐 Production Security Recommendations

For production deployment:

1. Use HTTPS/TLS.
2. Use a strong database password.
3. Store secrets in environment variables or AWS Secrets Manager.
4. Never commit credentials to GitHub.
5. Restrict SSH to trusted IP addresses.
6. Keep the operating system and packages updated.
7. Expose only required ports.
8. Configure secure PHP sessions.
9. Add CSRF protection.
10. Validate all input server-side.
11. Add rate limiting to authentication endpoints.
12. Use regular database backups.
13. Consider Amazon RDS for production databases.
14. Use CloudWatch for monitoring and logging.

---

# 📸 Screenshots

Add application screenshots to the `screenshots/` folder.

Recommended:

```text
screenshots/
├── home-page.png
├── registration-page.png
├── login-page.png
└── welcome-page.png
```

Then add them to this README:

```markdown
## Home Page

![CampusConnect Home Page](screenshots/home-page.png)

## Student Registration

![Registration Page](screenshots/registration-page.png)

## Student Login

![Login Page](screenshots/login-page.png)

## Successful Login

![Welcome Page](screenshots/welcome-page.png)
```

---

# 🧑‍💻 Author

**CampusConnect 2026**

A cloud-hosted student registration and authentication application developed using AWS EC2, Amazon Linux, Apache, PHP, MariaDB/MySQL, HTML5, and CSS3.

---

# 📄 License

This project is intended for educational, portfolio, and demonstration purposes.

---

# ⭐ Project Summary

CampusConnect 2026 demonstrates how to deploy a dynamic PHP web application on an AWS EC2 Linux server with database-backed authentication.

```text
AWS EC2
   +
Amazon Linux
   +
Apache
   +
PHP
   +
MariaDB/MySQL
   +
HTML/CSS
   +
Authentication
   +
Cloud Deployment
   =
CampusConnect 2026
```
