<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CDRRecord extends Model
{
    use SoftDeletes;

    /**
     * fillable 
     * @var array
     */
    protected $fillable = [
        "call_date",
        "call_time",
        "answered_by",
        "caller",
    ];


    protected $casts = [
        'call_date' => 'datetime',
        'call_time' => 'datetime',
    ];

    



}
