<?php

use App\Http\Controllers\{
    WaitlistController, PropertyController, LeaseController,
    DashboardController, MaintenanceController, MessageController,
    RepatriationController, WebhookController,
};
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
Route::get('/login',        fn() => view('pages.login'))->name('login');

// ── Webhooks (no auth — signature-verified) ──
Route::post('/webhooks/{processor}', [WebhookController::class, 'handle'])
    ->name('webhooks.handle')
    ->whereIn('processor', ['stripe','razorpay','flutterwave','xendit','mercadopago']);

// ── Authenticated app routes ──
Route::middleware(['auth','verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('properties', PropertyController::class)->only(['index','create','store','show','edit','update','destroy']);
    Route::post('/properties/{property}/leases',       [LeaseController::class, 'store'])->name('leases.store');
    Route::get('/leases/{lease}',                      [LeaseController::class, 'show'])->name('leases.show');
    Route::post('/leases/{lease}/maintenance',         [MaintenanceController::class, 'store'])->name('maintenance.store');
    Route::patch('/maintenance/{maintenanceRequest}',  [MaintenanceController::class, 'update'])->name('maintenance.update');
    Route::post('/leases/{lease}/messages',            [MessageController::class, 'store'])->name('messages.store');
    Route::post('/properties/{property}/repatriation', [RepatriationController::class, 'store'])->name('repatriation.store');
});
