<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
    public function leases()          { return $this->hasMany(Lease::class); }
    public function applications()    { return $this->hasMany(\App\Models\Application::class); }
    public function backgroundChecks(){ return $this->hasMany(\App\Models\BackgroundCheck::class); }
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
