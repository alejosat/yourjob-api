<?php

namespace Database\Factories;

use App\Models\EmployerProfile;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EmployerProfile>
 */
class EmployerProfileFactory extends Factory
{
    protected $model = EmployerProfile::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'location' => $this->faker->city,
            'industry' => $this->faker->companySuffix,
            'number_of_employees' => $this->faker->numberBetween(10, 500),
        ];
    }
}
