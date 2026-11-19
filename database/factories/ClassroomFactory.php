<?php

namespace Database\Factories;

use App\Models\Classroom;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Classroom>
 */
class ClassroomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique() -> randomElement(['10 PPLG 01','10 PPLG 02','11 PPLG 01', '11 PPLG 02', '11 PPLG 03']),
            'major' => fake()-> randomElement(['PPLG', 'DKV', 'ANIM']),

        ];
    }
}
