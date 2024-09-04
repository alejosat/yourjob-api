<?php

namespace Database\Factories;

use App\Models\EmployerProfile;
use App\Models\JobVacancy;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobVacancy>
 */
class JobVacancyFactory extends Factory
{

    protected $model = JobVacancy::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employer_id' => EmployerProfile::factory(),
            'job_title' => $this->faker->jobTitle,
            'job_description' => $this->faker->paragraph,
            'requirements' => $this->faker->sentence,
            'location' => $this->faker->city,
        ];
    }
}
