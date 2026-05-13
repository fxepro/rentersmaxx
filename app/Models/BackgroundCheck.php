<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

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
}
