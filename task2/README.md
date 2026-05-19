# Task 2 – Admin: Category, Sub-category, Brand & Product Management

**Student ID:** 23-50934-1
**Project:** Online Computer Shop (Web Technologies, Spring 2025-2026)

## What this part covers
Full CRUD on **categories** (including sub-categories), **brands**, and **products**, plus an admin dashboard with totals and low-stock alerts.

## Folder structure (MVC)
```
task2/
├── index.php
├── config/
│   ├── db.php         # mysqli connection (getConnection function)
│   └── auth.php       # admin-only gate + e() escape helper
├── controller/
│   ├── categoryController.php
│   ├── brandController.php
│   ├── productController.php
│   └── logout.php
├── model/
│   ├── categoryModel.php
│   ├── brandModel.php
│   └── productModel.php
├── view/
│   ├── dashboard.php
│   ├── _navbar.php
│   ├── category_list.php / category_add.php / category_edit.php
│   ├── brand_list.php    / brand_add.php    / brand_edit.php
│   └── product_list.php  / product_add.php  / product_edit.php
├── ajax/
│   └── getBrands.php       # JSON endpoint: brands by category
├── js/
│   └── validate.js         # client-side form validation + AJAX
├── css/
│   └── style.css
├── public/
│   └── uploads/products/   # uploaded product images
└── sql/
    └── schema.sql          # shared schema
```

Login / registration / remember-me belong to **Task 1** (separate folder `task1/`).
Task 2 just checks the session set by Task 1's login and gates admin pages.

## Setup (XAMPP)
1. Copy the `task2/` folder into `htdocs/`.
2. Open phpMyAdmin → import `sql/schema.sql` (creates `computer_shop5` DB + default admin).
3. Make sure `public/uploads/products/` is writable.
4. Visit `http://localhost/task2/`.
5. Default admin login (handled by Task 1): **admin@shop.com** / **admin123**

## How the Task 2 grading criteria are met
| # | Criterion | Where |
|---|-----------|-------|
| 1 | Basic Web Security | `mysqli_real_escape_string` on every input before SQL; `htmlspecialchars()` via `e()` on every output; image size and MIME type checks on uploads; admin session gate on every page. |
| 2 | UI (HTML/CSS) | `css/style.css` – plain responsive admin layout. |
| 3 | Feature Completeness | Full CRUD for category / brand / product + dashboard + low-stock alerts. |
| 4 | DB | Uses shared schema; foreign keys enforce integrity; delete is blocked when child records exist. |
| 5 | Auth (Session) | `session_start()` everywhere; `config/auth.php` enforces `$_SESSION['role'] == 'admin'`. |
| 6 | MVC | Strict `controller/`, `model/`, `view/`, `config/` separation. |
| 7 | JS Validation | `js/validate.js` validates every form before submit. |
| 8 | PHP Validation | Every controller re-validates before any DB write. |
| 9 | Ajax/JSON | `ajax/getBrands.php` returns JSON; consumed by product add/edit form via `XMLHttpRequest`. |
| 10 | Git | Work on `feature/task2-23-50934-1`, ≥3 commits, PR into `main`. |

## Notes
- Login, registration, profile, and remember-me are all owned by Task 1.
- `public/uploads/products/` is the shared image folder.
