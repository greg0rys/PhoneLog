<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static \Database\Factories\CSVWorkerFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CSVWorker newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CSVWorker newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CSVWorker query()
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CSVWorker whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CSVWorker whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CSVWorker whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CSVWorker extends Model
{
    /** @use HasFactory<\Database\Factories\CSVWorkerFactory> */
    use HasFactory;
}
