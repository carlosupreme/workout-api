<?php

namespace Database\Factories;

use App\Models\Workout;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<=Workout>
 */
class WorkoutFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'date' => $this->faker->date,
            'time_start' => $this->faker->date('H:i A'),
            'time_end' =>  $this->faker->date('H:i A')
        ];
    }
}
