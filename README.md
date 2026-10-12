# Webyotic - Enterprise Digital Engineering & Growth Platform

[![Laravel Version](https://img.shields.io/badge/Laravel-12.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com)
[![PHP Version](https://img.shields.io/badge/PHP-8.2%2B-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://php.net)
[![Tailwind CSS](https://img.shields.io/badge/TailwindCSS-3.x-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)](https://tailwindcss.com)
[![Vite](https://img.shields.io/badge/Vite-7.x-646CFF?style=for-the-badge&logo=vite&logoColor=white)](https://vitejs.dev)
[![Alpine.js](https://img.shields.io/badge/Alpine.js-3.x-8BC0D0?style=for-the-badge&logo=alpinedotjs&logoColor=white)](https://alpinejs.dev)
[![Tests Passing](https://img.shields.io/badge/Tests-36%20Passed-brightgreen?style=for-the-badge)](tests/)

---

## 📌 Table of Contents
1. [Architectural Blueprint](#-architectural-blueprint)
2. [Dual URL Setup (With & Without `/public`)](#-dual-url-setup-with--without-public)
3. [Directory Structure](#-directory-structure)
4. [Database Schema & Data Model](#-database-schema--data-model)
5. [Model Relationships](#-model-relationships)
6. [API & Web Routing Map](#-api--web-routing-map)
7. [Local Development Setup](#-local-development-setup)
8. [Production Deployment Architecture](#-production-deployment-architecture)
9. [CI/CD Pipeline (GitHub Actions)](#-cicd-pipeline-github-actions)
10. [Security & Optimization Checklist](#-security--optimization-checklist)

---

## 🏛️ Architectural Blueprint

Webyotic is built as an enterprise-grade digital engineering agency platform combining:
- **Clean Modern Architecture**: MVC structure on Laravel 12 with decoupled domain logic.
- **Dynamic Content Engine**: Fully configurable Hero Sliders, Services, Case Studies/Projects, Testimonials, Categories, and Blog.
- **Lead Generation Pipeline**: Interactive Project Estimator modal, Contact intake forms, and automated CRM Inquiry management.
- **Enterprise SEO & Meta Engine**: Automated canonical tags, Open Graph, Twitter Cards, JSON-LD Schema.org organization markup, dynamic RSS feed (`/feed`), and XML sitemap (`/sitemap.xml`).
- **Telemetry & Visitor Analytics**: Automated visitor tracking middleware capturing IP, User-Agent, visited route, and timestamps without third-party tracking scripts.
- **Admin Control Center**: Protected administrative back-office (`/admin`) for full CRUD management of all content, leads, advertisements, and site settings.

```
┌────────────────────────────────────────────────────────────────────────┐
│                          Webyotic Web Client                           │
│       (Tailwind CSS + Alpine.js + Responsive Dark/Light Themes)        │
└───────────────────────────────────┬────────────────────────────────────┘
                                    │ HTTP(S)
                                    ▼
┌────────────────────────────────────────────────────────────────────────┐
│                        Web Server Routing Layer                        │
│   ┌────────────────────────────────────────────────────────────────┐   │
│   │ Option A: Direct Web Root (e.g., http://localhost/vk/webyotic) │   │
│   │ Option B: Standard Public (e.g., http://localhost/.../public)  │   │
│   │ Option C: Production VHost (DocumentRoot -> public/)          │   │
│   └────────────────────────────────┬───────────────────────────────┘   │
└────────────────────────────────────┼───────────────────────────────────┘
                                     │
                                     ▼
┌────────────────────────────────────────────────────────────────────────┐
│                    Laravel 12 Application Core                         │
│  ├── Middleware: Web, Auth, IsAdmin, TrackVisitors                     │
│  ├── Controllers: Frontend (Home, Page, Sitemap), Admin Controllers   │
│  ├── Models & Eloquent ORM: SQLite (Local) / MySQL (Production)        │
│  └── Storage & Build Assets: Vite Manifest & Storage Symlink           │
└────────────────────────────────────────────────────────────────────────┘
```

---

## 🌐 Dual URL Setup (With & Without `/public`)

The application is engineered to operate seamlessly across all deployment topologies:

| Environment / Access Mode | URL Format | How It Works |
| :--- | :--- | :--- |
| **Apache Subfolder (Without `/public`)** | `http://localhost/vk/webyotic` | Root `.htaccess` redirects build assets (`build/`, `images/`, `uploads/`, `storage/`) directly into `public/`, and routes all application URLs through the root `index.php` front controller. |
| **Apache Subfolder (With `/public`)** | `http://localhost/vk/webyotic/public` | Bypasses root rewrite rules, handled directly by `public/.htaccess` and `public/index.php`. |
| **Local Artisan Server** | `http://127.0.0.1:8000` | Run via `php artisan serve`, directly serves the `public/` folder. |
| **Production Server (Nginx / Apache VHost)** | `https://yourdomain.com` | Document root points directly to `/var/www/webyotic/public`. Maximum security and performance. |

### Security Measures in Root `.htaccess`
- Direct access to sensitive files (`.env`, `composer.json`, `package.json`, `phpunit.xml`, `artisan`) returns **403 Forbidden**.
- Access to internal directories (`app/`, `bootstrap/`, `config/`, `database/`, `resources/`, `routes/`, `storage/app/`, `storage/framework/`, `storage/logs/`, `vendor/`) returns **403 Forbidden**.
- Public storage assets (`/storage/uploads/...`) remain accessible via the `storage:link` symlink.

---

## 📁 Directory Structure

```text
webyotic/
├── .github/
│   └── workflows/
│       └── deploy.yml            # Automated CI/CD pipeline (Test, Build, Deploy)
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/            # Admin CRUD controllers (Inquiry, Page, Post, etc.)
│   │   │   ├── Auth/             # Laravel Breeze authentication controllers
│   │   │   └── Frontend/         # Public controllers (HomeController, PageController, SitemapController)
│   │   └── Middleware/           # IsAdmin role check, TrackVisitors telemetry
│   └── Models/                   # Eloquent models (User, Post, Category, Inquiry, Slider, etc.)
├── bootstrap/
│   ├── app.php                   # Laravel application configuration and middleware stack
│   └── providers.php             # Service provider registry
├── config/                       # Application configuration files (app, database, filesystems, etc.)
├── database/
│   ├── factories/                # Eloquent model factories
│   ├── migrations/               # Database migration schemas
│   └── seeders/                  # Database seeders (DatabaseSeeder, AdminSeeder)
├── public/                       # Web root (Target of production web server)
│   ├── build/                    # Compiled Vite assets (CSS, JS, manifest.json)
│   ├── uploads/                  # Uploaded files
│   ├── storage/                  # Symlink to storage/app/public
│   ├── .htaccess                 # Standard Laravel public Apache rules
│   ├── index.php                 # Standard public entry point
│   ├── favicon.ico
│   └── robots.txt
├── resources/
│   ├── css/                      # Tailwind CSS source files
│   ├── js/                       # Alpine.js & frontend scripts
│   └── views/                    # Blade templates (frontend, admin, auth, components, layouts)
├── routes/
│   ├── auth.php                  # Authentication routes
│   ├── console.php               # Artisan console commands
│   └── web.php                   # Frontend and Admin route definitions
├── storage/                      # App storage, logs, framework cache
├── tests/
│   ├── Feature/                  # Feature tests (36 automated tests)
│   └── Unit/                     # Unit tests
├── .env.example                  # Environment configuration template
├── .htaccess                     # Root rewrite and security protection rules
├── apache-vhost.conf.example     # Apache VirtualHost configuration template
├── artisan                       # Laravel Artisan CLI executable
├── composer.json                 # PHP dependencies & project scripts
├── deploy.sh                     # Automated production zero-downtime deployment script
├── index.php                     # Root front controller for subfolder execution
├── nginx.conf.example            # Nginx production server block template
├── package.json                  # Node.js dependencies (Vite, Tailwind, Alpine)
├── tailwind.config.js            # Tailwind styling rules and dark mode theme config
└── vite.config.js                # Vite build bundler configuration
```

---

## 🗄️ Database Schema & Data Model

### Entity-Relationship Diagram

```mermaid
erDiagram
    USERS ||--o{ POSTS : "authors"
    CATEGORIES ||--o{ POSTS : "categorizes"

    USERS {
        bigint id PK
        string name
        string email UK
        string password
        string role "admin | user"
        timestamp email_verified_at
        timestamps created_at_updated_at
    }

    CATEGORIES {
        bigint id PK
        string name
        string slug UK
        timestamps created_at_updated_at
    }

    POSTS {
        bigint id PK
        string title
        string slug UK
        text body
        string image
        bigint user_id FK
        bigint category_id FK
        string seo_title
        text seo_description
        text seo_keywords
        string focus_keyword
        timestamps created_at_updated_at
    }

    INQUIRIES {
        bigint id PK
        string name
        string email
        string phone
        string service
        string budget
        string subject
        text message
        string status "new | in_review | contacted | closed"
        string ip_address
        timestamps created_at_updated_at
    }

    SLIDERS {
        bigint id PK
        string badge
        string title
        string highlight
        text subtitle
        string image
        string button_text
        string button_url
        string secondary_button_text
        string secondary_button_url
        string seo_stat_label_1
        string seo_stat_val_1
        string seo_stat_label_2
        string seo_stat_val_2
        string seo_stat_label_3
        string seo_stat_val_3
        int order
        boolean is_active
        timestamps created_at_updated_at
    }

    SERVICES {
        bigint id PK
        string title
        string slug UK
        string icon
        string image
        text short_description
        longtext description
        string seo_title
        text seo_description
        text seo_keywords
        string focus_keyword
        timestamps created_at_updated_at
    }

    PROJECTS {
        bigint id PK
        string title
        string slug UK
        string category
        string image
        text description
        string link
        json tags
        string seo_title
        text seo_description
        text seo_keywords
        string focus_keyword
        timestamps created_at_updated_at
    }

    TESTIMONIALS {
        bigint id PK
        string name
        string position
        string company
        text content
        int rating
        string image
        timestamps created_at_updated_at
    }

    PAGES {
        bigint id PK
        string title
        string slug UK
        longtext content
        string template
        string seo_title
        text seo_description
        text seo_keywords
        string focus_keyword
        timestamps created_at_updated_at
    }

    SETTINGS {
        bigint id PK
        string key UK
        longtext value
        string group
        string type
        timestamps created_at_updated_at
    }

    ADS {
        bigint id PK
        string name
        string location
        longtext code
        boolean is_active
        timestamps created_at_updated_at
    }

    VISITORS {
        bigint id PK
        string ip_address
        string user_agent
        string page_url
        timestamp visited_at
        timestamps created_at_updated_at
    }
```

---

## 🔗 Model Relationships

- **User**:
  - `posts()`: `hasMany(Post::class)` - One user can author multiple blog posts.
- **Category**:
  - `posts()`: `hasMany(Post::class)` - One category groups multiple blog posts.
- **Post**:
  - `user()`: `belongsTo(User::class)` - Belongs to its author.
  - `category()`: `belongsTo(Category::class)` - Belongs to a category (nullable on delete).
- **Inquiry**:
  - Standalone entity for inbound leads from the Contact Page and Interactive Project Estimator.
- **Slider**:
  - Ordered carousel items with custom call-to-actions and SEO statistics badges. Uses `getImageUrlAttribute()` to handle both uploaded assets and external CDN image URLs.
- **Visitor**:
  - Telemetry entity automatically populated by `TrackVisitors` middleware.

---

## 🗺️ API & Web Routing Map

### Public Frontend Routes
| Method | URI | Controller Action | Description |
| :--- | :--- | :--- | :--- |
| `GET` | `/` | `HomeController@index` | Homepage with hero slider, services, estimator, testimonials |
| `GET` | `/about` | `PageController@about` | Company philosophy, leadership, values |
| `GET` | `/services` | `PageController@services` | Catalog of engineering services |
| `GET` | `/gallery` | `PageController@gallery` | Portfolio showcase & case studies |
| `GET` | `/testimonials` | `PageController@testimonials` | Client reviews and rating proofs |
| `GET` | `/blog` | `PageController@blog` | Articles and industry insights |
| `GET` | `/blog/{slug}` | `PageController@blogShow` | Single post view with SEO metadata |
| `GET` | `/contact` | `PageController@contact` | Contact page |
| `POST` | `/contact` | `PageController@contactSubmit` | Form submission -> creates Inquiry |
| `POST` | `/quote` | `PageController@quoteSubmit` | Interactive Estimator submission -> creates Inquiry |
| `GET` | `/sitemap.xml` | `SitemapController@sitemap` | Dynamic XML sitemap for Google / Bing |
| `GET` | `/feed` | `SitemapController@rss` | Dynamic RSS 2.0 feed |
| `GET` | `/rss.xml` | `SitemapController@rss` | RSS XML alias |

### Admin Back-Office Routes (`/admin/*`)
*Protected by `auth` middleware.*

| Resource | URI Prefix | Controller | Features |
| :--- | :--- | :--- | :--- |
| **Dashboard** | `/admin/dashboard` | `DashboardController@index` | Overview metrics, inquiries count, visitor count |
| **Inquiries** | `/admin/inquiries` | `AdminInquiryController` | Lead inbox, status changer (`new`, `in_review`, `contacted`, `closed`), view, delete |
| **Sliders** | `/admin/sliders` | `AdminSliderController` | Full CRUD for homepage slider slides |
| **Services** | `/admin/services` | `AdminServiceController` | Manage service catalog items |
| **Projects** | `/admin/projects` | `AdminProjectController` | Case studies and portfolio entries |
| **Testimonials** | `/admin/testimonials` | `AdminTestimonialController` | Client reviews |
| **Posts** | `/admin/posts` | `AdminPostController` | Blog post management |
| **Categories** | `/admin/categories` | `AdminCategoryController` | Blog taxonomy |
| **Pages** | `/admin/pages` | `AdminPageController` | Custom CMS pages |
| **Users** | `/admin/users` | `AdminUserController` | Manage admin users & roles |
| **Ads** | `/admin/ads` | `AdminAdController` | Embed tracking codes or ads |
| **Settings** | `/admin/settings` | `AdminSettingController` | Global site identity, contact email, social links |

---

## 💻 Local Development Setup

### 1. Prerequisites
- PHP 8.2 or higher (with `pdo`, `mbstring`, `openssl`, `curl`, `gd`, `sqlite3` or `mysql` extensions)
- Composer 2.x
- Node.js 18+ and npm

### 2. Installation Steps
```bash
# Clone or navigate to the repository
cd c:/xampp/htdocs/vk/webyotic

# Install PHP dependencies
composer install

# Copy environment configuration
cp .env.example .env

# Generate application key
php artisan key:generate

# Run database migrations
php artisan migrate

# Link public storage
php artisan storage:link

# Install frontend dependencies & compile
npm install
npm run build
```

### 3. Running Locally
You can run the application in three ways:

**Option A: Through Apache / XAMPP**
- Without public: `http://localhost/vk/webyotic`
- With public: `http://localhost/vk/webyotic/public`

**Option B: Built-in Artisan Server**
```bash
php artisan serve
# Open http://127.0.0.1:8000
```

**Option C: Full Concurrent Dev Mode (Vite + Queue + Server)**
```bash
composer run dev
```

### 4. Running Tests
```bash
php artisan test
```

---

## 🚀 Production Deployment Architecture

When deploying to a production VPS (Ubuntu/Debian, DigitalOcean, AWS EC2, Linode):

### 1. Web Server Document Root
Always configure your web server (Nginx or Apache) to point its document root directly to the `public/` directory:
- **Correct**: `/var/www/webyotic/public`
- **Never point directly to the project root in production.**

### 2. Server Configuration Files
Ready-to-use production server configuration templates are included in the repository:
- `nginx.conf.example`: Production Nginx server block with SSL, HTTP/2, caching, and security headers.
- `apache-vhost.conf.example`: Production Apache VirtualHost configuration.

### 3. File Permissions
```bash
sudo chown -R www-data:www-data /var/www/webyotic
sudo chmod -R 775 /var/www/webyotic/storage
sudo chmod -R 775 /var/www/webyotic/bootstrap/cache
```

### 4. Production Deployment Script
Use the included automated `deploy.sh` script on your server:
```bash
bash deploy.sh
```

This script automatically executes:
1. `php artisan down` (Zero-downtime maintenance window)
2. `git pull origin main`
3. `composer install --no-dev --optimize-autoloader`
4. `npm ci && npm run build`
5. `php artisan migrate --force`
6. `php artisan storage:link`
7. `php artisan config:cache && php artisan route:cache && php artisan view:cache`
8. `php artisan queue:restart`
9. `chmod -R 775 storage bootstrap/cache`
10. `php artisan up`

---

## 🤖 CI/CD Pipeline (GitHub Actions)

The repository includes a ready-to-run GitHub Actions workflow in `.github/workflows/deploy.yml`.

### Workflow Stages
1. **Automated Testing & Asset Compilation**:
   - Runs on every push and pull request to `main`.
   - Spins up PHP 8.2 and Node.js 20.
   - Installs Composer & NPM dependencies with caching.
   - Compiles Vite production assets.
   - Executes `php artisan test` in an in-memory SQLite database.
2. **Automated SSH Deployment**:
   - Executes only on successful pushes to `main`.
   - Connects to your production VPS via encrypted SSH.
   - Runs `bash deploy.sh`.

### Required GitHub Repository Secrets
Navigate to **Settings > Secrets and variables > Actions** in your GitHub repository and add:

| Secret Name | Value Description | Example |
| :--- | :--- | :--- |
| `PROD_SERVER_HOST` | Remote server IP or domain | `198.51.100.24` |
| `PROD_SERVER_USER` | SSH username | `deployer` or `ubuntu` |
| `PROD_SSH_PRIVATE_KEY` | Private SSH Key with server access | `-----BEGIN OPENSSH PRIVATE KEY-----...` |
| `PROD_SERVER_PORT` | SSH port (defaults to 22) | `22` |
| `PROD_APP_DIR` | Absolute path to project on server | `/var/www/webyotic` |

---

## 🛡️ Security & Optimization Checklist

| Item | Production Requirement | Command / Setting |
| :--- | :--- | :--- |
| **Debug Mode** | Must be disabled | `APP_DEBUG=false` in `.env` |
| **Environment** | Set to production | `APP_ENV=production` in `.env` |
| **Application Key** | Must be generated | `php artisan key:generate` |
| **HTTPS Enforcement** | Active SSL certificate | Let's Encrypt Certbot |
| **Config Cache** | Cache configuration files | `php artisan config:cache` |
| **Route Cache** | Pre-compile route map | `php artisan route:cache` |
| **View Cache** | Pre-compile Blade templates | `php artisan view:cache` |
| **Asset Build** | Minified CSS/JS with hashes | `npm run build` |
| **Sensitive File Access** | Block direct HTTP access | Protected via root `.htaccess` & Nginx rules |

---

## 📄 License
This project is proprietary software developed for Webyotic. All rights reserved.
