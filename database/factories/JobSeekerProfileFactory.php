<?php

namespace Database\Factories;

use App\Models\JobSeekerProfile;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobSeekerProfile>
 */
class JobSeekerProfileFactory extends Factory
{

    protected $model = JobSeekerProfile::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'age' => $this->faker->numberBetween(18, 60),
            'contact_details' => $this->faker->phoneNumber,
            'education_level' => $this->faker->randomElement(['High School', 'Bachelor', 'Master', 'PhD']),
            'grades' => $this->faker->randomFloat(2, 0, 10),
            'work_experience' => $this->faker->sentence,
        ];
    }
}
