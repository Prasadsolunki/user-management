# User Management System (Laravel)

This is a Laravel-based user management app with registration, login, CRUD, roles, hobbies, password reset, and export to PDF/Excel.

## 🚀 Features
- Authentication (Login, Register, Forgot Password)
- User CRUD with:
  - Name, Email, Phone, Gender, Hobbies, Role
- Export users (Excel, PDF)
- Client-side + Server-side validation
- Bootstrap + jQuery UI

## 🛠 Setup

```bash
git clone https://github.com/your-username/user-management.git
cd user-management
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
npm install && npm run dev
php artisan serve
