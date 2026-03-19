<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CallHistory extends Model
{
    protected $table = "call_history";

    protected $fillable = [
        "user_id",
        "call_id"
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function cdr_record(): BelongsTo
    {
        return $this->belongsTo(CDRRecord::class);
    }
}
