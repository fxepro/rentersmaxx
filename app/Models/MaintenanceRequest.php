<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
