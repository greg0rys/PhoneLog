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


    protected $table = "cdr_records";
    /**
     * fillable 
     * @var array
     */
    protected $fillable = [
        "caller_number",
        "caller_id",
        "call_status",
        "answered_by",
        "start_time",
        "end_time",
    ];


    protected $casts = [
        'call_date' => 'datetime',
        'call_time' => 'datetime',
        'caller' => 'string',
        'answered_by' => 'string',
    ];





}
