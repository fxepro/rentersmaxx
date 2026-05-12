<?php

namespace App\Payment;

use App\Payment\Contracts\PaymentProcessor;
use App\Payment\Processors\StripeProcessor;
use App\Payment\Processors\RazorpayProcessor;
use App\Payment\Processors\FlutterwaveProcessor;
use App\Payment\Processors\XenditProcessor;
use App\Payment\Processors\MercadoPagoProcessor;
use InvalidArgumentException;

class ProcessorFactory
{
    /**
     * Resolve the correct PaymentProcessor for a given ISO 3166-1 alpha-2 country code.
     * Driven entirely by config/countries.php — no hardcoded logic here.
     */
    public static function for(string $countryCode): PaymentProcessor
    {
        $countryCode = strtoupper($countryCode);
        $countries   = config('countries');

        if (! isset($countries[$countryCode])) {
            throw new InvalidArgumentException(
                "Country [{$countryCode}] is not supported. Add it to config/countries.php."
            );
        }

        $processorSlug = $countries[$countryCode]['processor'];

        return match ($processorSlug) {
            'stripe'       => app(StripeProcessor::class),
            'razorpay'     => app(RazorpayProcessor::class),
            'flutterwave'  => app(FlutterwaveProcessor::class),
            'xendit'       => app(XenditProcessor::class),
            'mercadopago'  => app(MercadoPagoProcessor::class),
            default        => throw new InvalidArgumentException(
                "Processor [{$processorSlug}] has no registered implementation."
            ),
        };
    }

    /**
     * Return all supported country codes.
     */
    public static function supportedCountries(): array
    {
        return array_keys(config('countries', []));
    }

    /**
     * Check if a country is supported.
     */
    public static function supports(string $countryCode): bool
    {
        return isset(config('countries')[strtoupper($countryCode)]);
    }
}
