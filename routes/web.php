<?php
use App\Http\Controllers\Auth\{LoginController, RegisterController, ForgotPasswordController};
use App\Http\Controllers\{WaitlistController, WebhookController, DashboardController,
    PropertyController, LeaseController, TenantController, PaymentController, MaintenanceController};
use Illuminate\Support\Facades\Route;

// ── Marketing ──
Route::get('/',             fn() => view('pages.index'))->name('home');
Route::get('/how-it-works', fn() => view('pages.how-it-works'))->name('how-it-works');
Route::get('/features',     fn() => view('pages.features'))->name('features');
Route::get('/pricing',      fn() => view('pages.pricing'))->name('pricing');
Route::get('/countries',    fn() => view('pages.countries'))->name('countries');
Route::get('/about',        fn() => view('pages.about'))->name('about');
Route::get('/contact',      fn() => view('pages.contact'))->name('contact');
Route::get('/privacy',      fn() => view('pages.privacy'))->name('privacy');
Route::get('/terms',        fn() => view('pages.terms'))->name('terms');
Route::get('/cookies',      fn() => view('pages.cookies'))->name('cookies');
Route::get('/waitlist',     fn() => view('pages.waitlist'))->name('waitlist');
Route::post('/waitlist',    [WaitlistController::class, 'store'])->name('waitlist.store');

// ── Auth ──
Route::middleware('guest')->group(function () {
    Route::get('/login',            [LoginController::class, 'show'])->name('login');
    Route::post('/login',           [LoginController::class, 'login'])->name('auth.login');
    Route::post('/register',        [RegisterController::class, 'store'])->name('auth.register');
    Route::get('/forgot-password',  [ForgotPasswordController::class, 'show'])->name('password.request');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'send'])->name('password.email');
});
Route::post('/logout', [LoginController::class, 'logout'])->name('auth.logout')->middleware('auth');

// ── Webhooks ──
Route::post('/webhooks/{processor}', [WebhookController::class, 'handle'])
    ->name('webhooks.handle')
    ->whereIn('processor', ['stripe','razorpay','flutterwave','xendit','mercadopago']);

// ── Dashboard ──
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', fn() => view('dashboard.index'))->name('dashboard');

    Route::resource('properties', PropertyController::class)->only(['index','create','store','show','update','destroy']);
    Route::get('/properties/{property}/leases/create', [LeaseController::class, 'create'])->name('leases.create');
    Route::post('/properties/{property}/leases',       [LeaseController::class, 'store'])->name('leases.store');
    Route::get('/leases',          [LeaseController::class,       'index'])->name('leases.index');
    Route::get('/leases/{lease}',  [LeaseController::class,       'show'])->name('leases.show');
    Route::get('/tenants',         [TenantController::class,      'index'])->name('tenants.index');
    Route::get('/payments',        [PaymentController::class,     'index'])->name('payments.index');
    Route::get('/maintenance',     [MaintenanceController::class, 'index'])->name('maintenance.index');
    Route::patch('/maintenance/{maintenanceRequest}', [MaintenanceController::class, 'update'])->name('maintenance.update');
});
