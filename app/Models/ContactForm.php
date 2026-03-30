<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactForm extends Model
{
    /** @use HasFactory<\Database\Factories\ContactFormFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
            'name',
            'message',
            'email',
            'category',
            'contact_id',
            'phone_number',
            'ticket_number'
    ];

    protected $hidden =[

    ];


}
