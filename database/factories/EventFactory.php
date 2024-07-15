<?php

namespace Database\Factories;

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
        ];
    }
}
