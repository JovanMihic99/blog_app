# Blog App

A simple PHP-based blog application, which allows users to register, login, create, edit, and delete blog posts. Built with PHP and MySQL.

## Table of Contents
- [Features](#features)
- [Technologies Used](#technologies-used)
- [Installation](#installation)
- [Usage](#usage)
- [Configuration](#configuration)

## Features
- User registration and authentication
- Create, edit, and delete blog posts
- View a list of all blog posts
- Simple user management

## Technologies Used
- PHP 8.1.2
- MySQL 8.0.39
- CSS
- JavaScript

## Installation

To run the Blog App locally, follow these steps:

### 1. Clone the repository:
```bash
git clone https://github.com/JovanMihic99/blog_app.git
```

### 2. Place the project in the server directory:
Move the project to your PHP server's root directory (e.g., `/var/www/html/` on Ubuntu).

### 3. Set up the MySQL database:
Use the database schema script located in `scripts/blog_site_schema.sql` to create the database.

```bash
mysql -u root -p < scripts/blog_site_schema.sql
```

### 4. Configure database connection:
In `config/config.php`, replace the following values with your own database credentials:
```php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'your_db_username');
define('DB_PASSWORD', 'your_db_password');
define('DB_DATABASE', 'blogapp');
```

### 5. Run the server:
Navigate to your local server and access the application at:
```url
http://localhost:8000/blog_app
```

## Usage
1. Navigate to `http://localhost:8000/blog_app` in your browser.
2. Register a new account or login to manage blog posts.
3. Create, edit, and delete blog posts via the interface.

## Configuration
In the `config/config.php` file, configure your database details such as the host, username, password, and database name.
