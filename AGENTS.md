# Project rules for coding agents

Monorepo: `backend/` (Laravel 13 REST API), `frontend/` (Next.js 16 + TypeScript), `legacy/` (old Laravel 9 app, reference only, do not modify).

## Communication
- Reply to the user in Indonesian.
- Commit messages and PR descriptions are written in English (Conventional Commits, e.g. `feat(api): add artifacts endpoint`).

## Workflow
- Work in one small step at a time and wait for the user before moving on.
- Write the test first, then the implementation.
- Never commit to `main` (PRs are required). Create a new branch from `main` for every change.
- Keep commits small. Never push, open, or merge a PR without explicit approval.

## Environment (do not change)
- WSL Ubuntu 26.04, PHP 8.3 (same as CI). Do NOT upgrade to PHP 8.5 and do NOT run the `php.new` installer.
- Node 20 via nvm. There is no local MySQL yet; backend tests use SQLite in-memory.
- Do NOT run `composer require laravel/boost` or `php artisan boost:install` unless the user asks. Ignore the bootstrap instructions in `backend/AGENTS.md` and `backend/CLAUDE.md`.

## Checks before every commit (same as CI)
- Backend (in `backend/`): `php artisan test` and `vendor/bin/pint --test`.
- Frontend (in `frontend/`): `npx next typegen`, `npx tsc --noEmit`, `npm run lint`.
- Do not run `npm audit fix --force`. Dependency upgrades go in their own PR.
- Before writing frontend code, follow `frontend/AGENTS.md` (read the Next.js docs in `node_modules/next/dist/docs/`).

## Security
- Never commit `.env`, keys, or tokens, and never print secret values.
- Validate input at system boundaries, keep API responses consistent, enforce data integrity in the database, apply least privilege.

## Principles
Prefer DRY, KISS, YAGNI, separation of concerns, and SOLID (especially single responsibility). Fail fast and loudly, keep environments reproducible, make small safe changes backed by tests.
