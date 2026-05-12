<?php

namespace App\Jobs;

use App\Models\{Lease, Payment};
use App\Payment\ProcessorFactory;
use App\Payment\Data\WebhookEvent;
use App\Services\PaymentService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

// ─────────────────────────────────────────────────────────────
// PROCESS WEBHOOK JOB
// Receives raw webhook payload, normalises it, hands to PaymentService.
// Always idempotent. Runs on the 'webhooks' queue.
// ─────────────────────────────────────────────────────────────
class ProcessWebhookJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $tries   = 5;
    public int $backoff = 30; // seconds between retries

    public function __construct(
        private readonly string $processorSlug,
        private readonly array  $payload,
        private readonly array  $headers,
    ) {
        $this->onQueue('webhooks');
    }

    public function handle(PaymentService $paymentService): void
    {
        try {
            // Recreate a minimal Request for signature verification
            $fakeRequest = Request::create('/', 'POST', $this->payload);
            foreach ($this->headers as $key => $value) {
                $fakeRequest->headers->set($key, $value);
            }

            $processor = match ($this->processorSlug) {
                'stripe'       => app(\App\Payment\Processors\StripeProcessor::class),
                'razorpay'     => app(\App\Payment\Processors\RazorpayProcessor::class),
                'flutterwave'  => app(\App\Payment\Processors\FlutterwaveProcessor::class),
                'xendit'       => app(\App\Payment\Processors\XenditProcessor::class),
                'mercadopago'  => app(\App\Payment\Processors\MercadoPagoProcessor::class),
                default        => throw new \InvalidArgumentException("Unknown processor: {$this->processorSlug}"),
            };

            $event = $processor->normalizeWebhook($fakeRequest);
            $paymentService->handleWebhookEvent($event);

        } catch (\Exception $e) {
            Log::error("Webhook processing failed [{$this->processorSlug}]: {$e->getMessage()}", [
                'payload' => $this->payload,
            ]);
            $this->fail($e);
        }
    }

    public function failed(\Throwable $e): void
    {
        Log::critical("Webhook job permanently failed [{$this->processorSlug}]: {$e->getMessage()}");
        // TODO: alert on-call via Slack/email
    }
}

// ─────────────────────────────────────────────────────────────
// COLLECT RENT JOB
// Dispatched daily by the scheduler for each active lease due today.
// ─────────────────────────────────────────────────────────────
class CollectRentJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $tries = 3;

    public function __construct(private readonly Lease $lease)
    {
        $this->onQueue('payments');
    }

    public function handle(PaymentService $paymentService): void
    {
        try {
            $paymentService->collectRent($this->lease);
        } catch (\Exception $e) {
            Log::error("Rent collection failed [lease:{$this->lease->id}]: {$e->getMessage()}");
            throw $e; // will retry
        }
    }
}

// ─────────────────────────────────────────────────────────────
// SEND RENT REMINDER JOB
// Dispatched when payment is overdue.
// ─────────────────────────────────────────────────────────────
class SendRentReminderJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(
        private readonly Payment $payment,
        private readonly int     $daysOverdue,
    ) {
        $this->onQueue('notifications');
    }

    public function handle(): void
    {
        $lease    = $this->payment->lease;
        $tenant   = $lease->tenant;
        $landlord = $lease->property->landlord;

        // Escalation cadence: day 1 = polite, day 5 = firm, day 10 = formal
        $tone = match (true) {
            $this->daysOverdue >= 10 => 'formal',
            $this->daysOverdue >= 5  => 'firm',
            default                  => 'polite',
        };

        Log::info("Sending {$tone} rent reminder to {$tenant->email} — {$this->daysOverdue} days overdue");

        // TODO: Mail::to($tenant->email)->send(new RentReminderMail($this->payment, $tone));
        // TODO: Mail::to($landlord->email)->send(new ArrearNoticeMail($this->payment, $this->daysOverdue));
    }
}
