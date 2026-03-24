<?php

namespace Database\Factories;

use App\Models\CDRRecord;
use Carbon\Carbon;
use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<CDRRecord>
 */
class CDRRecordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

        "contact_id" => Contact::factory(),
        "caller_number" => fake()->phoneNumber(),
        "caller_id" => fake()->name(),
        "call_status" => fake()->safeColorName(),
        "start_time" => Carbon::now(),
        "end_time" => Carbon::now(),
        ];
    }
}
