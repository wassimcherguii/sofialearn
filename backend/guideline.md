# Working Guidelines

Follow these rules for every change in this repository.

## Core Principles
- Do only the requested task. Avoid extra refactors or scope creep.
- Preserve existing behavior unless explicitly asked to change it.
- Keep edits minimal and localized; do not reformat unrelated code.
- Use existing patterns and structure already present in the codebase.

## Context First
- Before starting any task, read these files for context:
  - `backend/tasks.md` (what tasks were requested and their details)
  - `backend/done-tasks.md` (what is already implemented)
- If uncertainty remains, prefer small, reversible changes and note assumptions.

## Internationalization (i18n)
- Static UI translations: use `__('pages.admin.login.*')`-style keys.
- Translation files are organized per route: `backend/lang/{locale}/pages/**`.
- Do not duplicate translations in other locations.
- Locale is enforced by `SetLocale` middleware; language switch is `POST /locale`.

## Database Translations
- For model fields with multiple language columns (e.g., `name_fr`, `name_en`, `name_ar`), use `App\Services\TranslationService` for lookups and query aliases.

## Routes & Middleware
- Place public/protected routes under `routes/web.php` within the existing middleware groups.
- Admin pages must be protected by `auth` and role checks or the dedicated logic already present.

## Frontend (Blade + Assets)
- Use Flowbite + Tailwind components where applicable.
- Load assets via Vite using `@vite(['resources/css/app.css','resources/js/app.js'])`.

## Quality & Safety
- After edits, ensure no linter issues in changed files.
- Avoid introducing breaking changes; keep PRs/commits scoped.
- When adding files, use clear, descriptive names.

## Task Logging
- For each completed task, append an entry to `backend/tasks.md` with:
  - Title, description, bullet list of done items
- If a feature is finalized, summarize it in `backend/done-tasks.md`.

## Communication
- State assumptions briefly in commit messages or task notes.
- If a requirement conflicts with existing guidelines, follow the instruction and note the deviation.


