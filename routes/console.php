<?php

use App\Jobs\CollectRentJob;
use App\Jobs\SendRentReminderJob;
use App\Models\{Lease, Payment};
use Illuminate\Support\Facades\Schedule;

// ─────────────────────────────────────────────────────────────
// RENT COLLECTION — runs daily at 00:01 UTC
// Dispatches CollectRentJob for every active lease due today
// ─────────────────────────────────────────────────────────────
Schedule::call(function () {
    $today = now()->day;

    Lease::where('status', 'active')
        ->where('due_day', $today)
        ->whereHas('property') // ensure property still exists
        ->with('property')
        ->chunk(100, function ($leases) {
            foreach ($leases as $lease) {
                CollectRentJob::dispatch($lease);
            }
        });

})->dailyAt('00:01')->name('collect-rent')->withoutOverlapping();

// ─────────────────────────────────────────────────────────────
// ARREARS REMINDERS — runs daily at 09:00 UTC
// Sends escalating reminders for overdue payments
// ─────────────────────────────────────────────────────────────
Schedule::call(function () {
    $overduePayments = Payment::where('status', 'pending')
        ->where('due_date', '<', now()->subDay())
        ->with('lease.tenant', 'lease.property.landlord')
        ->get();

    foreach ($overduePayments as $payment) {
        $daysOverdue = now()->diffInDays($payment->due_date);

        // Send on day 1, 5, and 10
        if (in_array($daysOverdue, [1, 5, 10])) {
            SendRentReminderJob::dispatch($payment, $daysOverdue);
        }

        // Mark as failed after day 10 (second retry already done)
        if ($daysOverdue > 10 && $payment->retry_count >= 2) {
            $payment->update(['status' => 'failed']);
        }
    }

})->dailyAt('09:00')->name('arrears-reminders')->withoutOverlapping();
