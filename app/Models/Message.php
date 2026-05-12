<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
