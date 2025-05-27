# 🚀 MVC PHP Application

A professional implementation of the **Model-View-Controller (MVC)** architecture focused on security, maintainability, and clean code organization.

---

## 🔍 MVC Architecture

- **Model:** Handles data and secure CRUD operations using prepared statements.  
- **View:** Dynamic, modular templates with flexible layouts and selective script loading.  
- **Controller:** Processes user input, coordinates between model and view, with robust routing.

---

## 🛣️ Routing & URL Management

- Routing encapsulated in a dedicated `Router` class mapping URLs to controller actions.  
- Supports GET and POST requests and handles query parameters (e.g., `/article/edit?id=1`).  
- Designed for easy extensibility and maintainability.

---

## 🔐 Authentication & Session Management

- Secure user login/logout with proper session handling.  
- Helper functions like `isLoggedIn()` to manage access control.  
- Route protection with automatic redirects for unauthorized users.

---

## 📄 Form Handling & File Uploads

- Secure processing of POST forms with input validation.  
- Supports file uploads handled properly via `$_FILES`.  
- Clear user feedback for errors and successful actions.

---

## 🛡️ Security Best Practices

- Uses PDO prepared statements to prevent SQL injection.  
- Escapes HTML output (`htmlspecialchars()`) to prevent XSS attacks.  
- Secure session management and session destruction.

---

## ⚙️ Code Organization & Modularity

- Clear separation of routing, business logic, and view rendering.  
- Reusable helper functions (e.g., `base_url()`, `getLoggedInUserFullName()`).  
- Improves maintainability and extensibility.

---

## ❗ Error Handling

- Graceful handling of 404 Not Found for invalid routes.  
- User-friendly error messages for invalid form inputs or other issues.

---

> **This project** is a complete, secure, and scalable PHP MVC system designed for efficient web application development.

---

✨ *For more details, explore the code or feel free to reach out!* ✨
