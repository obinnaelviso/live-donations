<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $fillable = [
        'firstname', 'lastname', 'email', 'amount', 'status', 'campaign_id'
    ];

    public function campaign() {
        return $this->belongsTo(Campaign::class);
    }
}
