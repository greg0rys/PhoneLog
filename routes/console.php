<?php


use Illuminate\Support\Facades\Schedule;


Schedule::command('app:parse_file')->hourly();
Schedule::command('queue:work --stop-when-empty')->everyMinute();
