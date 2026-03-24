<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
 * @property int $id
 * @property string|null $caller_number
 * @property string|null $caller_id
 * @property string|null $call_status
 * @property string|null $start_time
 * @property string|null $end_time
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CDRRecord whereCallStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CDRRecord whereCallerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CDRRecord whereCallerNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CDRRecord whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CDRRecord whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CDRRecord whereEndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CDRRecord whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CDRRecord whereStartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CDRRecord whereUpdatedAt($value)
 * @mixin \Eloquent
 */
#[ObservedBy(CDRRecordObserver::class)]
class CDRRecord extends Model
{
    use SoftDeletes, HasFactory;


    protected $table = "cdr_records";
    /**
     * fillable 
     * @var array
     */
    protected $fillable = [
        "contact_id",
        "caller_number",
        "caller_id",
        "call_status",
        "answered_by",
        "start_time",
        "end_time",
    ];


    protected $casts = [
        'contact_id' => 'integer',
        'call_date' => 'datetime',
        'call_time' => 'datetime',
        'caller' => 'string',
        'answered_by' => 'string',
    ];

    /**
     * Establish the 1:1 relationship of a contact to a call record
     * @return BelongsTo<Contact, CDRRecord>
     */
    public function contact(): BelongsTo
    {
        return $this->belongsTo(Contact::class, 'contact_id', 'id');
    }





}
