<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MailingList extends Model
{
    protected $fillable = ['email'];
    public function forms() {
    	return $this->hasMany(ContactForm::class);
    }
}
