<?php

namespace Database\Factories;

use App\Models\CDRRecord;
use Carbon\Carbon;
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
            'caller_number' => (string)fake()->phoneNumber(),
            'caller_id' => fake()->name(),
            'call_status' => "Answered",
            'end_time' => Carbon::now(),
        ];
    }
}
