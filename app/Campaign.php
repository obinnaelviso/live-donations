<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $fillable = [
        'featured_image', 'title', 'description', 'target', 'is_featured', 'status', 'expire_at'
    ];

    protected $dates = ['expire_at'];

    protected $casts = [
        'expire_at' => 'datetime',
    ];

    public function donations() {
        return $this->hasMany(Donation::class);
    }
}
