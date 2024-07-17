<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name"        => $this->faker->unique()->name(),
            "date"        => $this->faker->date(),
            "destination" => $this->faker->address(),
            "description" => $this->faker->text(),
            "status"      => $this->faker->randomElement(Event::VALID_STATUS),
        ];
    }
}
