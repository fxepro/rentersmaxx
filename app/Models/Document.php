<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
