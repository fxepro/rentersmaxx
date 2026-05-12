<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

// ─────────────────────────────────────────────────────────────
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, HasUuids, Notifiable, SoftDeletes;

    protected $keyType  = 'string';
    public    $incrementing = false;

    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone', 'password',
        'role', 'home_country', 'home_currency', 'locale', 'timezone',
    ];

    protected $hidden = ['password', 'remember_token'];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'kyc_verified_at'   => 'datetime',
            'password'          => 'hashed',
            'kyc_verified'      => 'boolean',
        ];
    }

    public function properties() { return $this->hasMany(Property::class, 'landlord_id'); }
    public function leases()     { return $this->hasMany(Lease::class, 'tenant_id'); }

    public function isLandlord(): bool { return $this->role === 'landlord'; }
    public function isTenant(): bool   { return $this->role === 'tenant'; }
    public function fullName(): string { return "{$this->first_name} {$this->last_name}"; }
}

// ─────────────────────────────────────────────────────────────
class Property extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $keyType  = 'string';
    public    $incrementing = false;

    protected $fillable = [
        'landlord_id', 'name', 'address_line1', 'address_line2',
        'city', 'state_province', 'postal_code', 'country_code',
        'currency_code', 'processor_slug', 'type', 'bedrooms', 'status',
    ];

    public function landlord()   { return $this->belongsTo(User::class, 'landlord_id'); }
    public function leases()     { return $this->hasMany(Lease::class); }
    public function documents()  { return $this->morphMany(Document::class, 'documentable'); }

    public function activeLeases()
    {
        return $this->leases()->where('status', 'active');
    }

    public function processorConfig(): array
    {
        return config("countries.{$this->country_code}", []);
    }
}

// ─────────────────────────────────────────────────────────────
class Lease extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $keyType  = 'string';
    public    $incrementing = false;

    protected $fillable = [
        'property_id', 'tenant_id', 'rent_minor_units', 'currency_code',
        'due_day', 'grace_period_days', 'frequency', 'deposit_minor_units',
        'start_date', 'end_date', 'status',
    ];

    protected function casts(): array
    {
        return [
            'start_date'   => 'date',
            'end_date'     => 'date',
            'activated_at' => 'datetime',
        ];
    }

    public function property()           { return $this->belongsTo(Property::class); }
    public function tenant()             { return $this->belongsTo(User::class, 'tenant_id'); }
    public function mandates()           { return $this->hasMany(PaymentMandate::class); }
    public function payments()           { return $this->hasMany(Payment::class); }
    public function maintenanceRequests(){ return $this->hasMany(MaintenanceRequest::class); }
    public function messages()           { return $this->hasMany(Message::class); }
    public function documents()          { return $this->morphMany(Document::class, 'documentable'); }

    public function activeMandate()
    {
        return $this->mandates()->where('status', 'active')->latest()->first();
    }

    /** Rent formatted for display */
    public function formattedRent(): string
    {
        return number_format($this->rent_minor_units / 100, 2) . ' ' . $this->currency_code;
    }
}

// ─────────────────────────────────────────────────────────────
class PaymentMandate extends Model
{
    use HasUuids;

    protected $keyType  = 'string';
    public    $incrementing = false;

    protected $fillable = [
        'lease_id', 'processor_slug', 'processor_mandate_id',
        'status', 'payment_method_type', 'authorised_at', 'cancelled_at',
    ];

    protected function casts(): array
    {
        return ['authorised_at' => 'datetime', 'cancelled_at' => 'datetime'];
    }

    public function lease()    { return $this->belongsTo(Lease::class); }
    public function payments() { return $this->hasMany(Payment::class, 'mandate_id'); }
}

// ─────────────────────────────────────────────────────────────
class Payment extends Model
{
    use HasUuids, SoftDeletes;

    protected $keyType  = 'string';
    public    $incrementing = false;

    protected $fillable = [
        'lease_id', 'mandate_id', 'processor_ref',
        'amount_minor_units', 'currency_code',
        'fx_rate_snapshot', 'home_currency_code', 'home_amount_minor_units',
        'status', 'retry_count', 'due_date', 'collected_at',
    ];

    protected function casts(): array
    {
        return ['due_date' => 'datetime', 'collected_at' => 'datetime'];
    }

    public function lease()   { return $this->belongsTo(Lease::class); }
    public function mandate() { return $this->belongsTo(PaymentMandate::class, 'mandate_id'); }
    public function events()  { return $this->hasMany(PaymentEvent::class); }

    /** FX rate as a decimal (stored as integer × 1,000,000) */
    public function fxRate(): float
    {
        return $this->fx_rate_snapshot / 1_000_000;
    }

    public function formattedAmount(): string
    {
        return number_format($this->amount_minor_units / 100, 2) . ' ' . $this->currency_code;
    }
}

// ─────────────────────────────────────────────────────────────
class PaymentEvent extends Model
{
    use HasUuids;

    protected $keyType  = 'string';
    public    $incrementing = false;

    protected $fillable = [
        'payment_id', 'event_type', 'idempotency_key',
        'processor_payload', 'occurred_at',
    ];

    protected function casts(): array
    {
        return ['processor_payload' => 'array', 'occurred_at' => 'datetime'];
    }

    public function payment() { return $this->belongsTo(Payment::class); }
}

// ─────────────────────────────────────────────────────────────
class RepatriationLog extends Model
{
    use HasUuids;

    protected $keyType  = 'string';
    public    $incrementing = false;
    protected $table = 'repatriation_logs';

    protected $fillable = [
        'landlord_id', 'property_id',
        'amount_minor_units', 'currency_code',
        'fx_rate_snapshot', 'home_currency_code', 'home_amount_minor_units',
        'repatriated_on', 'notes',
    ];

    protected function casts(): array
    {
        return ['repatriated_on' => 'date'];
    }

    public function landlord() { return $this->belongsTo(User::class, 'landlord_id'); }
    public function property() { return $this->belongsTo(Property::class); }
}

// ─────────────────────────────────────────────────────────────
class MaintenanceRequest extends Model
{
    use HasUuids, SoftDeletes;

    protected $keyType  = 'string';
    public    $incrementing = false;

    protected $fillable = [
        'lease_id', 'raised_by', 'category', 'title', 'description',
        'status', 'resolution_notes', 'acknowledged_at', 'resolved_at',
    ];

    protected function casts(): array
    {
        return ['acknowledged_at' => 'datetime', 'resolved_at' => 'datetime'];
    }

    public function lease()     { return $this->belongsTo(Lease::class); }
    public function raisedBy()  { return $this->belongsTo(User::class, 'raised_by'); }
    public function documents() { return $this->morphMany(Document::class, 'documentable'); }
}

// ─────────────────────────────────────────────────────────────
class Message extends Model
{
    use HasUuids, SoftDeletes;

    protected $keyType  = 'string';
    public    $incrementing = false;

    protected $fillable = ['lease_id', 'sender_id', 'body', 'read_at'];

    protected function casts(): array
    {
        return ['read_at' => 'datetime'];
    }

    public function lease()  { return $this->belongsTo(Lease::class); }
    public function sender() { return $this->belongsTo(User::class, 'sender_id'); }
}

// ─────────────────────────────────────────────────────────────
class Document extends Model
{
    use HasUuids, SoftDeletes;

    protected $keyType  = 'string';
    public    $incrementing = false;

    protected $fillable = [
        'uploaded_by', 'type', 'disk', 'path',
        'original_filename', 'mime_type', 'size_bytes', 'expires_at',
    ];

    protected function casts(): array
    {
        return ['expires_at' => 'datetime'];
    }

    public function documentable() { return $this->morphTo(); }
    public function uploadedBy()   { return $this->belongsTo(User::class, 'uploaded_by'); }

    public function formattedSize(): string
    {
        $bytes = $this->size_bytes;
        if ($bytes >= 1_048_576) return round($bytes / 1_048_576, 1) . ' MB';
        return round($bytes / 1024, 1) . ' KB';
    }
}

// ─────────────────────────────────────────────────────────────
class WaitlistEmail extends Model
{
    use HasUuids;

    protected $keyType  = 'string';
    public    $incrementing = false;
    protected $table = 'waitlist_emails';

    protected $fillable = [
        'email', 'first_name', 'last_name', 'home_country',
        'property_countries', 'portfolio_size', 'pain_point', 'ref',
    ];
}
