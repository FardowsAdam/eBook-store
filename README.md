# eBook Store

An online bookstore web application built as a CS314 project. It allows users to browse books, manage a cart, and simulate a checkout process. Admins can manage the book catalog through a secure admin panel.

## 🛠 Tech Stack

- **Frontend**: HTML, CSS, JavaScript
- **Backend**: PHP
- **Database**: MySQL

## 📦 Features

### 👥 User Features:
- Register and log in
- Browse available books
- Add/remove books from the cart
- Simulate checkout process

### 🔐 Admin Features:
- Admin login panel
- Add/edit/delete books
- Manage book inventory

## 🖥 Installation & Setup

1. Clone this repository or download the ZIP.
2. Move the project folder to your `htdocs` directory (XAMPP).
3. Start Apache and MySQL using XAMPP.
4. Import the `shop_db.sql` file into phpMyAdmin.
5. Open a browser and go to `http://localhost/eBook`.

## 🔑 Login as Admin or User

Navigate to: `http://localhost/project_folder/login.php`

Enter your Email and Password from registration.

On successful login:

If user_type = 'admin', you will be redirected to (admin_page.php).

If user_type = 'user', you will be redirected to (home.php).

If credentials are incorrect, an error will display:
“incorrect email or password!”


## 🧑‍💻 Authors

-Fardows Adam

## 📝 Notes

This project was completed for educational purposes as part of CS314.

