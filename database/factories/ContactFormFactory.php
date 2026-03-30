<?php

namespace Database\Factories;

use App\Models\Contact;
use App\Models\ContactForm;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ContactForm>
 */
class ContactFormFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $id = (ContactForm::all()->isEmpty()) ? Contact::factory()->create()->id : ContactForm::all()->random()->id;
        return [
            'name' => fake()->name(),
            'message' => fake()->text(),
            'email' => fake()->email(),
            'category' => "testing",
            'contact_id' => $id,
            'phone_number' => fake()->phoneNumber(),
            'ticket_number' => rand(1,32314),
        ];
    }
}
