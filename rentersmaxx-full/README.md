# Rentersmaxx — Laravel Application

Cross-country · Multi-currency · Multi-property rental management.

---

## Stack

| Layer | Technology |
|---|---|
| Framework | Laravel 11 |
| Database | PostgreSQL (Neon serverless on Laravel Cloud) |
| Cache / Queues | Redis |
| Frontend | Blade + Alpine.js + Livewire |
| Payments | Stripe, Razorpay, Flutterwave, Xendit, Mercado Pago |
| Storage | S3-compatible (Laravel Cloud object storage) |
| Hosting | Laravel Cloud (Starter → Growth) |

---

## Local Setup

```bash
# 1. Install a fresh Laravel 11 project
composer create-project laravel/laravel rentersmaxx

# 2. Replace these folders with the ones in this zip:
#    app/         → models, services, controllers, payment layer
#    resources/   → views, css, js
#    database/    → migrations, seeders
#    routes/      → web.php, console.php
#    config/      → countries.php (+ update existing configs)

# 3. Install dependencies
composer install

# 4. Set up environment
cp .env.example .env
php artisan key:generate

# 5. Configure .env
#    - DB_* credentials (PostgreSQL)
#    - REDIS_* credentials
#    - STRIPE_KEY, STRIPE_SECRET, STRIPE_WEBHOOK_SECRET
#    - RAZORPAY_KEY, RAZORPAY_SECRET, RAZORPAY_WEBHOOK_SECRET
#    - FLUTTERWAVE_*, XENDIT_*, MERCADOPAGO_* credentials
#    - FX_API_KEY (exchangerate-api.com or similar)
#    - AWS_* for S3 document storage

# 6. Run migrations
php artisan migrate

# 7. Start the dev server
php artisan serve

# 8. Start queue worker (separate terminal)
php artisan queue:work --queue=webhooks,payments,notifications,default
```

---

## Deploying to Laravel Cloud

```bash
# 1. Push to GitHub
git init
git add .
git commit -m "Initial commit"
git remote add origin https://github.com/yourorg/rentersmaxx.git
git push -u origin main

# 2. Connect repo to Laravel Cloud
#    cloud.laravel.com → New Application → Import from GitHub

# 3. Add environment variables in Laravel Cloud dashboard
#    (same as .env.example — never commit real .env)

# 4. Laravel Cloud auto-detects:
#    - PHP version from composer.json
#    - Build command: composer install --no-dev --optimize-autoloader
#    - Start command: php artisan serve (or nginx + php-fpm)

# 5. Add services in Laravel Cloud dashboard:
#    - Serverless PostgreSQL (Neon)
#    - Redis KV store
#    - Object storage (for documents)

# 6. Run migrations on first deploy:
php artisan migrate --force
```

---

## Architecture

```
app/
├── Http/Controllers/Controllers.php   ← All controllers (split into files as needed)
├── Models/Models.php                  ← All Eloquent models
├── Services/
│   ├── PaymentService.php             ← Core payment orchestration
│   └── FxLedgerService.php            ← FX rates + ledger aggregation
├── Payment/
│   ├── Contracts/PaymentProcessor.php ← The interface
│   ├── ProcessorFactory.php           ← Country → processor resolution
│   └── Processors/
│       ├── StripeProcessor.php        ← US, EU, UK, AU, SG, JP, CA
│       ├── RazorpayProcessor.php      ← India
│       └── OtherProcessors.php        ← Flutterwave, Xendit, MercadoPago
├── Jobs/Jobs.php                      ← ProcessWebhookJob, CollectRentJob, SendRentReminderJob
└── Payment/Data/PaymentData.php       ← DTOs (ChargeRequest, ChargeResponse etc.)

config/
└── countries.php                      ← THE lookup table: country → processor → currency

routes/
├── web.php                            ← Marketing pages + app routes + webhooks
└── console.php                        ← Scheduled jobs (rent collection, arrears)

database/
└── migrations/
    ├── ..._create_users_table.php
    └── ..._create_core_tables.php     ← properties, leases, payments, documents, messages
```

---

## Adding a new country

1. Open `config/countries.php`
2. Add one line:
```php
'AE' => ['processor' => 'stripe', 'currency' => 'AED', 'method' => 'Cards'],
```
3. Deploy. Done. No code changes required.

---

## Webhook endpoints

| Processor | URL |
|---|---|
| Stripe | `POST /webhooks/stripe` |
| Razorpay | `POST /webhooks/razorpay` |
| Flutterwave | `POST /webhooks/flutterwave` |
| Xendit | `POST /webhooks/xendit` |
| Mercado Pago | `POST /webhooks/mercadopago` |

All webhooks are:
1. Signature-verified synchronously
2. Immediately queued as `ProcessWebhookJob` on the `webhooks` queue
3. Never processed inline
4. Idempotent — duplicate events silently discarded

---

## Queue configuration

Queues in priority order:
- `webhooks` — inbound payment events (highest priority)
- `payments` — outbound rent collection
- `notifications` — emails and alerts
- `default` — everything else

Run on Laravel Cloud with a dedicated worker cluster.

---

## Key design decisions

- **All monetary amounts stored as integers in minor units** (paise, pence, cents) — never floats
- **FX rate snapshotted at every payment** as `integer × 1,000,000` — never recalculated retroactively
- **UUIDs on all primary keys** — no sequential ID exposure
- **Soft deletes everywhere** — nothing is hard-deleted
- **Payment abstraction layer** — app never references a processor class directly
- **Country config drives routing** — adding a market = one config line, no code change
