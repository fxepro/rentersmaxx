<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

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
