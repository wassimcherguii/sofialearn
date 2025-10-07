# SofiaLearn Backend - Completed Features

## Infrastructure & Tooling
- Vite configured for Laravel (`vite.config.js`) with Tailwind CSS 4 integration
- NPM dependencies installed for backend (`vite`, `laravel-vite-plugin`, `tailwindcss`, `flowbite`)
- Blade layout uses Vite assets via `@vite`

## UI Frameworks
- Tailwind CSS 4 enabled and compiled
- Flowbite installed and integrated (imports in `resources/css/app.css` and `resources/js/app.js`)
- Flowbite component test added (alert on home page)

## Routing & Pages
- Public routes: home, about, contact, courses
- Auth routes: login, register, logout
- Admin routes:
  - `/admin/login` (public) – Flowbite-based login page
  - `/admin` (protected) – admin dashboard with access control + working logout
- Role-based route groups (admin, teacher, student)

## Admin Login Page
- Flowbite navbar: site name + language dropdown
- Translated labels/placeholders via Laravel i18n
- Posts to existing `/login` with redirect to `/admin`

## Internationalization (i18n)
- Locale middleware `SetLocale`:
  - Defaults to French (fr) and honors session locale
  - Dynamically loads nested translation files from `lang/{locale}/pages/**`
- Language switch route: `POST /locale` persists locale in session
- Per-route translation files:
  - `lang/en/pages/admin/login.php`
  - `lang/fr/pages/admin/login.php`
  - `lang/ar/pages/admin/login.php`
- `TranslationService` for DB multi-column translations with fallback order `fr → en → ar`

## Database & Migrations
- Multi-column translation schema for: courses, chapters, lessons, quizzes, homework, exams, documents
- Default Laravel tables restored: cache, cache_locks, jobs, job_batches, failed_jobs

## Seeders
- `DatabaseSeeder` creates:
  - Admin: `admin@sofialearn.com`
  - Teacher: `teacher@sofialearn.com`
  - Student: `student@sofialearn.com`

## Views & Layout
- `layouts/app.blade.php` uses Vite and provides global structure
- Admin dashboard view with working logout

## Quality & Maintenance
- Lint checks clean on edited files
- Guidance provided for clearing caches and compiled views during i18n changes

## Notes
- React app in `web/` kept out of scope; Laravel backend serves current pages
