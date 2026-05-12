<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\WaitlistController;
use App\Http\Controllers\WebhookController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// ── Public marketing pages ──
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
Route::get('/login',        [LoginController::class, 'show'])->name('login')->middleware('guest');
Route::post('/login',       [LoginController::class, 'login'])->name('auth.login')->middleware('guest');
Route::post('/logout',      [LoginController::class, 'logout'])->name('auth.logout')->middleware('auth');
Route::post('/register',    [RegisterController::class, 'store'])->name('auth.register')->middleware('guest');
Route::get('/forgot-password',  [ForgotPasswordController::class, 'show'])->name('password.request')->middleware('guest');
Route::post('/forgot-password', [ForgotPasswordController::class, 'send'])->name('password.email')->middleware('guest');

// ── Webhooks (no auth) ──
Route::post('/webhooks/{processor}', [WebhookController::class, 'handle'])
    ->name('webhooks.handle')
    ->whereIn('processor', ['stripe','razorpay','flutterwave','xendit','mercadopago']);

// ── Dashboard (auth required) ──
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', fn() => view('dashboard.index'))->name('dashboard');
});
