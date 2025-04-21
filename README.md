# 📊 Mini CRM System (Laravel)

A simple but powerful CRM (Customer Relationship Management) system built with Laravel. The system supports role-based dashboards for Admins, Employees, and Customers. It allows efficient customer management, employee assignments, and action tracking.

---

## 🚀 Features

### 🛠 Admin Panel
- Add and manage employees
- Add and manage customers
- Assign customers to employees

### 👨‍💼 Employee Panel
- Add new customers
- Add actions for each customer: `Call`, `Visit`, or `Follow Up`
- Record the result of each action

### 👤 Customer Panel
- View details (expandable with future features)

### ✅ Authentication
- Login only (no registration)
- Role-based access control
- Redirected dashboards based on user type (Admin, Employee, Customer)

### 🌐 Other
- Responsive UI with a clean and minimal design
- Protected routes using Laravel's authentication middleware

---

## 🧱 Built With

- [Laravel](https://laravel.com)
- Blade Templates
- Bootstrap
- MySQL
- Laravel Auth (Breeze)

---

## 🛠 Setup Instructions

1. **Clone the repo**
   ```bash
   git clone https://github.com/bassant1999/Simple_CRM.git
   cd mini-crm
