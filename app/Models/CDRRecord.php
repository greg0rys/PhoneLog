<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use App\Observers\CDRRecordObserver;

/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CDRRecord newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CDRRecord newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CDRRecord onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CDRRecord query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CDRRecord withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CDRRecord withoutTrashed()
 * @mixin \Eloquent
 */
#[ObservedBy(CDRRecordObserver::class)]
class CDRRecord extends Model
{
    use SoftDeletes;

    /**
     * fillable 
     * @var array
     */
    protected $fillable = [
        "caller",
        "call_date",
        "call_time",
        "answered_by",
    ];


    protected $casts = [
        'call_date' => 'datetime',
        'call_time' => 'datetime',
        'caller' => 'string',
        'answered_by' => 'string',
    ];

    



}
