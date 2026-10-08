# KA Software website (kasoftware.in)

Laravel 12 / PHP 8.2 marketing site for KA Software, plus generators for
standalone static satellite sites. Git remote: `github.com/anandakarthick/wrbsite`,
work is committed directly to `main` and deployed by `git pull` on the server
(behind Cloudflare).

## Local tooling

- `php` is not on PATH on this machine. Use `C:\xampp\php\php.exe`.
- Quick smoke test: `C:\xampp\php\php.exe artisan serve --port=8123` then hit the URL.
- `.env` holds secrets — do not read or commit it.

## Layout

| Path | Purpose |
|------|---------|
| `routes/web.php` | All routes. Home, profile, success-stories, 6 hardcoded case studies, services, products, contact POST, sitemap, Vaha policy pages. |
| `resources/data/*.json` | **Content source of truth** — `products.json`, `services.json`, `testimonials.json`, `tech-insights.json`. No DB content; SQLite is only for Laravel defaults. |
| `app/Http/Controllers/` | `ProductController` / `ServiceController` read the JSON by slug (404 if missing). `ContactController` handles the form. `SitemapController` builds `/sitemap.xml`. |
| `resources/views/sections/` | Partials assembled into `welcome.blade.php` (home page). |
| `resources/views/case-studies/` | One Blade per case study. |
| `app/Helpers/SEOHelper.php` + `components/seo-meta.blade.php` | Meta tags. |
| `public/css/`, `public/fonts/` | Hand-written CSS, self-hosted fonts (Vite present but not the main pipeline). |
| `public/vaha/` | Static Vaha AI app-store policy pages (privacy, delete-account). |
| `public/sites/<slug>/` | **Generated** product mini-sites — never edit by hand. |
| `scripts/` | Generators: `generate-product-sites.php` (12 product sites from `products.json`), `generate-nambaparisal.php`, `generate-svproducts.php`, `generate-tennextsoft.php` (3 sister-company sites), `generate-site-logos.php`, `generate-fb-cover*.php` (marketing images → `marketing/fb-covers/`). |

## Products

`products.json` → `products[]` each with `slug`, `name`, `tagline`, `image`, `site_url`.
`site_url` is the "Visit website" link on `/products` and `/products/{slug}`; when empty it
falls back to `sites/<slug>/index.html`. Current live-app overrides:

| Product | site_url |
|---------|----------|
| vahaai | https://vaha.ai.kasoftware.in |
| ka-crm | https://crm.kasoftware.in |
| pipeforge | https://cicd.kasoftware.in |
| shopnest | https://saas.ecom.kasoftware.in |
| voxa-ai | https://voxa.kasoftware.in |
| others | `https://<slug>.kasoftware.in` |

To point a product at a new URL: edit only `site_url` in `products.json`, commit, push.

## Contact form (`POST /contact`)

Layers, in order: `throttle:5,1` → honeypot field `website` → reCAPTCHA (v2/v3, score
threshold `services.recaptcha.min_score`) or session math-captcha fallback when no key →
3-second time trap. Inquiry is logged, appended to `storage/app/contact_inquiries.json`,
then `ContactInquiry` (to `ADMIN_EMAIL`) and `CustomerAutoReply` are queued.
Email setup: `EMAIL_SETUP_GUIDE.md`.

## Conventions

- Commit messages: imperative one-liner, e.g. `Point ShopNest product to live platform at saas.ecom.kasoftware.in`.
- Static pages needing a clean URL: put the file in `public/<dir>/` and add a
  `Route::get` returning `response()->file(public_path(...))` (see Vaha routes).
- After deploy on the server: `git pull`, then `php artisan route:clear` / `view:clear` if cached.

## Change log

| Date | Commit | Change |
|------|--------|--------|
| 2026-09-19 | `17d1bfc` | PipeForge `site_url` → `https://cicd.kasoftware.in` (`products.json`). |
| 2026-09-22 | `9fa1224` | Added Vaha AI policy pages: `public/vaha/privacy.html`, `public/vaha/delete-account.html`, served at `/vaha/privacy` and `/vaha/delete-account` via routes in `web.php`. |
| 2026-10-09 | — | Added this `CLAUDE.md`. |
