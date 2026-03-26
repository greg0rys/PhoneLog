<?php

namespace App\Models;

use App\Observers\ContactObserver;
use Database\Factories\ContactFactory;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

#[ObservedBy(ContactObserver::class)]
class Contact extends Model
{
    /** @use HasFactory<ContactFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'phone_number',
    ];

    protected $hidden = [

    ];

    protected $casts = [
        'name' => 'string',
        'phone_number' => 'string',
    ];

    public function records(): HasMany
    {
        return $this->hasMany(CDRRecord::class, 'contact_id');
    }
}
