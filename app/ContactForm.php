<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactForm extends Model
{
    protected $fillable = ['name', 'subject', 'message'];

    public function mailing_list() {
        return $this->belongsTo(MailingList::class);
    }
}
