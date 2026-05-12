<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
