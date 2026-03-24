<?php
use App\Models\Contact;
use App\Models\CDRRecord;
use App\Helpers\FileParser;

/* defenitions */

function make_contact()
{
    Contact::create([
        "name" => fake()->name(),
        "phone_number" => fake()->text()
    ]);

    echo "Added new contact\n";
}


/* CALLS */
// make_contact();

// $rec = CDRRecord::pluck("caller_number");

// // collection of duplicates to clean up
// $rec->duplicates(function($c){
//     echo $c . "\n";
// });

// $orig = CDRRecord::orderBy('id')
//     ->get()
//     ->unique('start_time')
//     ->pluck('id');

//     // get rid of the duplicate start_time calls but count them.
// $deleted_recs = CDRRecord::whereNotIn('id', $orig)->delete();

// $times = CDRRecord::pluck('start_time');

// // This counts every single time
// $counts = $times->countBy()->each(function($c){
//     echo "$c \n";
// });
// echo $counts . "\n";

// // This filters the list down to ONLY show the ones with duplicates
// $onlyDuplicates = $counts->filter(function ($count) {
//     return $count > 1;
// });

// View the result in Tinker
// $onlyDuplicates->all();

$duplicates = CDRRecord::select(['caller_number', 'start_time', 'caller_id'])
    ->selectRaw('COUNT(*) as phones_rung') // This gets your count!
    ->groupBy('caller_number')
    ->havingRaw('COUNT(*) > 1')            // Only show the duplicates
    ->get();

// Loop through and print the results
foreach ($duplicates as $dup) {
    echo "Call from {$dup->caller_id} rang {$dup->phones_rung} phones.\n";
}

Contact::pluck(column: 'id')->each(function($c){
    echo "$c\n";
});