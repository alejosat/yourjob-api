<?php

namespace Database\Factories;

use App\Models\JobApplication;
use App\Models\JobSeekerProfile;
use App\Models\JobVacancy;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobApplication>
 */
class JobApplicationFactory extends Factory
{
    protected $model = JobApplication::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'job_seeker_id' => JobSeekerProfile::factory(),
            'job_vacancy_id' => JobVacancy::factory(),
            'status' => $this->faker->randomElement(['applied', 'interviewing', 'rejected', 'hired']),
        ];
    }
}
