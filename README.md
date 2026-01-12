# TalentHub – Multi-Role Authentication System (MVC PHP)


##  Project Overview
TalentHub is a recruitment platform under development.  
This project focuses on building a **robust, reusable multi-role authentication system** that will serve as the technical foundation for future features.

The system is built using a **custom MVC architecture (without any framework)**.

---

##  Project Goal
The main objective is to manage:
- User authentication
- Role-based access control
- Secure route protection
- Clean and extensible MVC architecture

---

##  User Roles
|   Role     | Registration |      Dashboard     | Routes       |
|------------|--------------|--------------------|--------------|
| Candidate  |     Yes      | Candidate Dashboard| /candidate/* |
| Recruiter  |     Yes      | Recruiter Dashboard| /recruiter/* |
|   Admin    |  No (manual) |    Admin Panel     |   /admin/*   |

Each role has:
- Dedicated routes
- Dedicated controllers
- Protected views

---

##  Architecture Overview
The application follows a strict MVC pattern:

public/index.php
↓
Router
↓
Controller
↓
Model
↓
View

### Key Rules
- Single entry point: `public/index.php`
- No direct access to views/controllers
- No SQL in controllers
- No business logic in views

---

##  Authentication Features
- User registration (Candidate & Recruiter)
- Role selection during registration
- Secure login for all roles
- PHP session management
- Secure logout
- Password hashing using `password_hash()`

---

##  Role Management
- Roles stored in database
- Role saved in session after login
- Automatic redirection based on role:

---

### Public Routes
- `/`
- `/login`
- `/register`

### Protected Routes
- `/candidate/*` → Candidate only
- `/recruiter/*` → Recruiter only
- `/admin/*` → Admin only

Each protected route verifies:
- User authentication
- Role authorization

---

##  Security Measures
- Password hashing (`password_hash`)
- PDO prepared statements
- Session validation on protected routes
- Input validation (email, password)
- CSRF protection
- XSS prevention via output escaping

---

##  UML Diagrams
Before coding, the following diagrams were designed:
- Use Case Diagram
- Class Diagram (User, Role, relationships)

All UML files are available in the `/uml` directory.

---

##  Technologies Used
- PHP (OOP)
- PDO
- MySQL
- HTML5 / CSS
- JavaScript (client-side validation)

---

##  Bonus Features (Optional)
- Remember Me (secure cookie)
- Login attempts logging
- Custom 404 page
- Client-side form validation

---

##  Project Structure
auth-workshop/
├── public/
│ └── index.php # Front Controller (All requests start here)
├── app/
│ ├── controllers/ # Handle user requests and business logic
│ ├── models/ # Interact with database
│ ├── views/ # HTML templates
│ └── core/ # Framework components (Router, Database, etc.)
├── config/ # Configuration files
├── storage/ # Database schema and migrations
└── README.md

##  MVC Architecture Flow
```
┌─────────────────────────────────────────────┐
│ HTTP Request (GET /login)                   │
└──────────────────────┬──────────────────────┘
                       ↓
    ┌────────────────────────────┐
    │ public/index.php           │
    │ (Front Controller)         │
    └────────────┬───────────────┘
                 ↓
    ┌────────────────────────────┐
    │ app/core/Router.php        │
    │ (Route to Controller)      │
    └────────────┬───────────────┘
                 ↓
    ┌────────────────────────────┐
    │ AuthController::loginForm  │
    │ (Business Logic)           │
    └────────────┬───────────────┘
                 ↓
    ┌────────────────────────────┐
    │ User Model (if needed)     │
    │ (Database Operations)      │
    └────────────┬───────────────┘
                 ↓
    ┌────────────────────────────┐
    │ views/auth/login.php │
    │ (HTML Template) │
    └────────────┬───────────────┘
                 ↓
    ┌────────────────────────────┐
    │ views/layout.php           │
    │ (Master Layout)            │
    └────────────┬───────────────┘
                 ↓
    ┌────────────────────────────┐
    │ HTML Response              │
    └────────────────────────────┘
```

---

##  Conclusion
This project demonstrates:
- Clean MVC implementation
- Secure authentication system
- Scalable role-based architecture
- Reusable foundation for future PHP projects
