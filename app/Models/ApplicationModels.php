<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Application extends Model
{
    use HasUuids, SoftDeletes;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'property_id', 'first_name', 'last_name', 'email', 'phone',
        'move_in_date', 'monthly_income_minor_units', 'income_currency',
        'message', 'status', 'landlord_notes', 'reviewed_at',
    ];

    protected function casts(): array
    {
        return [
            'move_in_date' => 'date',
            'reviewed_at'  => 'datetime',
        ];
    }

    public function property()         { return $this->belongsTo(Property::class); }
    public function backgroundChecks() { return $this->hasMany(BackgroundCheck::class); }

    public function fullName(): string  { return "{$this->first_name} {$this->last_name}"; }

    public function formattedIncome(): string
    {
        if (!$this->monthly_income_minor_units) return '—';
        return number_format($this->monthly_income_minor_units / 100, 0) . ' ' . ($this->income_currency ?? '');
    }
}

class BackgroundCheck extends Model
{
    use HasUuids;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'application_id', 'property_id', 'type', 'method', 'status',
        'provider_ref', 'notes', 'document_path', 'document_name', 'completed_at',
    ];

    protected function casts(): array
    {
        return ['completed_at' => 'datetime'];
    }

    public function application() { return $this->belongsTo(Application::class); }
    public function property()    { return $this->belongsTo(Property::class); }

    public function statusColor(): string
    {
        return match($this->status) {
            'passed'        => 'green',
            'failed'        => 'red',
            'pending'       => 'gold',
            'manual_review' => 'navy',
            default         => 'grey',
        };
    }
}
