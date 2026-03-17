<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static \Database\Factories\CSVWorkerFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CSVWorker newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CSVWorker newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CSVWorker query()
 * @mixin \Eloquent
 */
class CSVWorker extends Model
{
    /** @use HasFactory<\Database\Factories\CSVWorkerFactory> */
    use HasFactory;
}
