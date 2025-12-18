# Phase 3 — Project 1: AJAX Todo List (Full CRUD)

A practical Laravel project to **master AJAX CRUD** (Create, Read, Update, Delete)  
using **pure JavaScript (fetch API)** — no page reloads, no Livewire, no Inertia.

This project focuses on **real fundamentals** used in production systems.

---

## 🎯 Project Goal

- Understand how AJAX works with Laravel
- Build full CRUD without page refresh
- Practice RESTful routes & controllers
- Handle UI updates manually (DOM manipulation)
- Learn optimistic UI patterns

---

## 🚀 Features

- Display all todos
- Add a new task (form submit / Enter key)
- Toggle task completion (checkbox)
- Delete task with confirmation
- Loading & error feedback
- Empty state handling
- Optimistic UI updates

---

## 🧰 Tech Stack (2025)

- Laravel 12
- Eloquent ORM + Migrations
- RESTful routes (web.php)
- Vanilla JavaScript (fetch API)
- Tailwind CSS (Vite)
- MySQL / SQLite

> ❌ No Livewire  
> ❌ No Inertia  
> ❌ No frontend framework  

---

## 📦 Project Setup

### 1️⃣ Create Laravel Project

```bash
composer create-project laravel/laravel ajax-todo-list
cd ajax-todo
````

Install frontend dependencies:

```bash
npm install
```

---

## 🗄️ Database Setup

Update your `.env` file with database credentials, then run:

```bash
php artisan migrate
```

---

## 🧱 Model & Migration

Create the Todo model with migration:

```bash
php artisan make:model Todo -m
```

Run migrations:

```bash
php artisan migrate
```

---

## 🛣️ Routes

Routes are defined in:

```text
routes/web.php
```

CRUD routes follow REST conventions:

* index
* store
* update
* destroy

---

## 🎮 Controller

Create the controller:

```bash
php artisan make:controller TodoController
```

Controller responsibilities:

* Return the main page
* Handle AJAX requests (JSON)
* Validate data
* Use route model binding
* Return partial HTML for better UX

---

## 🖼️ Views

Views structure:

```text
resources/views/
├── todos.blade.php
└── partials/
    └── todo-item.blade.php
```

* Main page renders layout and form
* Each todo item is a reusable partial
* Partial HTML is returned during AJAX create

---

## ⚙️ JavaScript (AJAX Logic)

JavaScript is located in:

```text
resources/js/app.js
```

Handles:

* Create todo (POST)
* Toggle completed (PATCH)
* Delete todo (DELETE)
* DOM updates without reload
* Event delegation
* Optimistic UI updates

---

## ▶️ Run the Project

Start frontend build:

```bash
npm run dev
```

Start Laravel server:

```bash
php artisan serve
```

Visit:

```text
http://127.0.0.1:8000
```

---

## ✅ What You Learn From This Project

* How AJAX works with Laravel
* RESTful CRUD with real HTTP verbs
* CSRF handling in fetch requests
* Validation and JSON responses
* Partial rendering for performance
* Clean separation of concerns
* Production-style frontend behavior

---

## 🧠 Learning Focus

> If you can build this project **without copying code**,
> you understand **AJAX + Laravel fundamentals**.

---

## 📜 License

Open-source for learning and practice.
