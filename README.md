# 📝 Laravel Task Manager

A clean, modern, and responsive **Task Management System** built with **Laravel 12** + **Breeze (Blade Stack)**.  
Allows users to **Create, View, Edit, and Delete** tasks with optional image uploads and due dates.

---

## 🔧 Features

- ✅ User Authentication (via Laravel Breeze)
- ✅ Dashboard with Navigation Bar
- ✅ Create, Update, and Delete Tasks
- ✅ Upload & Preview Task Image
- ✅ Due Date Highlight (Upcoming, Today, Expired)
- ✅ Responsive UI with Tailwind CSS
- ✅ Dark Mode Support
- ✅ Clean Blade Component Structure
- ✅ Logout, Profile Links Included

---

## 📸 UI Highlights

- 🖼️ Form and Task Cards with modern design
- 🌈 Gradient headers and transitions
- 📱 Fully responsive on all devices

---

## 🚀 Installation

```bash
git clone https://github.com/Kavita0011/task-manager.git
cd task-manager
cp .env.example .env
composer install
php artisan key:generate
php artisan migrate
php artisan storage:link
npm install && npm run build
php artisan serve
