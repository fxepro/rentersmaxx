<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

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
